<?php
include '../config.php'; 
include '../includes/auth.php'; 

if (!in_array($user_role, ['Admin Pusat', 'Admin Cabang', 'Keuangan'])) {
    die("Akses dilarang.");
}

if (!isset($_POST['student_id']) || !isset($_POST['new_status'])) {
    die('Permintaan tidak valid.');
}

$student_id = intval($_POST['student_id']);
$new_status = $_POST['new_status'];

if (!in_array($new_status, ['Diterima', 'Ditolak'])) {
    die('Status tidak valid.');
}

$sql = "UPDATE students SET status = ? WHERE student_id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "si", $new_status, $student_id);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Status siswa (ID: " . $student_id . ") berhasil diubah menjadi " . $new_status . "'); window.location='" . BASE_URL . "modules/payment/list.php';</script>";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>