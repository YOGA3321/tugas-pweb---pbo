<?php
// Path config.php diperbaiki
include '../config.php'; 
// Path auth.php diperbaiki
include '../includes/auth.php'; 

// Hanya Admin
if ($user_role != 'Admin Pusat' && $user_role != 'Admin Cabang') {
    die("Akses dilarang.");
}

// Validasi dasar
$required = ['class_name', 'teacher_id', 'branch_id', 'status'];
foreach ($required as $f) {
    if (empty($_POST[$f])) {
        die('Field ' . $f . ' wajib diisi.');
    }
}

// Ambil dan sanitize data
$class_name = mysqli_real_escape_string($koneksi, $_POST['class_name']);
$teacher_id = intval($_POST['teacher_id']);
$branch_id = intval($_POST['branch_id']);
$status = mysqli_real_escape_string($koneksi, $_POST['status']);

// (Gunakan prepared statements di implementasi final)
$sql = "INSERT INTO classes (class_name, teacher_id, branch_id, status)
        VALUES ('$class_name', '$teacher_id', '$branch_id', '$status')";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('Kelas baru berhasil ditambahkan!'); window.location='" . BASE_URL . "modules/classes/list.php';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>