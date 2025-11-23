<?php
include '../config.php';

$required = ['full_name', 'birth_date', 'address', 'email', 'phone', 'class_id', 'branch_id'];
foreach ($required as $f) {
    if (empty($_POST[$f])) {
        die('Field ' . $f . ' wajib diisi.');
    }
}

$full_name = mysqli_real_escape_string($koneksi, $_POST['full_name']);
$birth_date = mysqli_real_escape_string($koneksi, $_POST['birth_date']);
$address = mysqli_real_escape_string($koneksi, $_POST['address']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$phone = mysqli_real_escape_string($koneksi, $_POST['phone']);
$class_id = intval($_POST['class_id']);
$branch_id = intval($_POST['branch_id']);
$notes = isset($_POST['notes']) ? mysqli_real_escape_string($koneksi, $_POST['notes']) : '';

function handleUpload($fileKey, $uploadDir) {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES[$fileKey]['tmp_name'];
        $fileName = basename($_FILES[$fileKey]['name']);
        $fileSize = $_FILES[$fileKey]['size'];
        
        $fileType = mime_content_type($fileTmp);
        $allowed = ['image/jpeg', 'image/png', 'application/pdf'];
        
        if (!in_array($fileType, $allowed)) {
            die('Tipe file tidak diizinkan untuk ' . $fileKey . '. Gunakan JPG/PNG/PDF.');
        }

        if ($fileSize > 2 * 1024 * 1024) {
            die('Ukuran file ' . $fileKey . ' melebihi limit 2MB.');
        }

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $newName = time() . '_' . bin2hex(random_bytes(6)) . '.' . $ext;
        $dest = $uploadDir . $newName;

        if (move_uploaded_file($fileTmp, $dest)) {
            return $newName;
        } else {
            die('Gagal menyimpan file ' . $fileKey);
        }
    }
    return null;
}

// --- Proses Upload ---
$studentUploadDir = __DIR__ . '/../uploads/students/';
$paymentUploadDir = __DIR__ . '/../uploads/payments/'; // Buat folder baru jika perlu

// Pastikan folder ada
if (!is_dir($studentUploadDir)) mkdir($studentUploadDir, 0755, true);
if (!is_dir($paymentUploadDir)) mkdir($paymentUploadDir, 0755, true);

// Proses upload Foto (Wajib)
$photoName = handleUpload('photo', $studentUploadDir);
if ($photoName === null) {
    die('Foto siswa wajib diunggah.');
}

// Proses upload Bukti Bayar (Opsional)
$paymentProofName = handleUpload('payment_proof', $paymentUploadDir);
$sql = "INSERT INTO students (name, birth_date, address, email, phone, class_id, branch_id, photo, payment_proof, registration_date, status, notes)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'Menunggu', ?)";

$stmt = mysqli_prepare($koneksi, $sql);

// "ssssiiisss" = string, string, string, string, int, int, int, string, string, string
mysqli_stmt_bind_param($stmt, "ssssiiisss", 
    $full_name, 
    $birth_date, 
    $address, 
    $email, 
    $phone, 
    $class_id, 
    $branch_id, 
    $photoName, 
    $paymentProofName, 
    $notes
);

if (mysqli_stmt_execute($stmt)) {
    $newId = mysqli_insert_id($koneksi); 
    header("Location: " . BASE_URL . "success.php?id=" . $newId);
    exit;
} else {
    // Cek jika email duplikat
    if (mysqli_errno($koneksi) == 1062) {
         echo "<script>alert('Error: Email " . $email . " sudah terdaftar.'); window.history.back();</script>";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>