<?php
// register_process.php
// Path config.php diperbaiki
include '../config.php';

// Validasi dasar
$required = ['full_name', 'birth_date', 'address', 'email', 'phone', 'class_id', 'branch_id'];
foreach ($required as $f) {
    if (empty($_POST[$f])) {
        die('Field ' . $f . ' wajib diisi.');
    }
}

// Sanitize (Gunakan prepared statements untuk implementasi final)
$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$class_id = intval($_POST['class_id']);
$branch_id = intval($_POST['branch_id']);
$notes = isset($_POST['notes']) ? mysqli_real_escape_string($conn, $_POST['notes']) : '';

// --- Logika Upload Foto ---
// Path 'uploads' relatif dari file PHP ini
$uploadDir = __DIR__ . '/../uploads/students/'; 
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$photoName = null;
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $fileTmp = $_FILES['photo']['tmp_name'];
    $fileName = basename($_FILES['photo']['name']);
    $fileSize = $_FILES['photo']['size'];
    
    // Validasi tipe file
    $fileType = mime_content_type($fileTmp);
    $allowed = ['image/jpeg', 'image/png'];
    
    if (!in_array($fileType, $allowed)) {
        die('Tipe file tidak diizinkan. Gunakan JPG/PNG.');
    }

    // Validasi ukuran file (2MB)
    if ($fileSize > 2 * 1024 * 1024) {
        die('Ukuran file melebihi limit 2MB.');
    }

    // Buat nama unik
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $photoName = time() . '_' . bin2hex(random_bytes(6)) . '.' . $ext;
    $dest = $uploadDir . $photoName;

    if (!move_uploaded_file($fileTmp, $dest)) {
        die('Gagal menyimpan file foto.');
    }
} else {
    die('Foto siswa wajib diunggah.');
}
// --- Akhir Logika Upload Foto ---

// Insert ke database (sesuaikan nama tabel/kolom dengan ERD Anda)
$sql = "INSERT INTO students (name, birth_date, address, email, phone, class_id, branch_id, photo, registration_date, status)
        VALUES
        ('$full_name', '$birth_date', '$address', '$email', '$phone', '$class_id', '$branch_id', '$photoName', NOW(), 'Menunggu')";

if (mysqli_query($conn, $sql)) {
    $newId = mysqli_insert_id($conn);
    // Arahkan ke halaman sukses (satu level di atas)
    header("Location: ../success.php?id=" . $newId);
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>