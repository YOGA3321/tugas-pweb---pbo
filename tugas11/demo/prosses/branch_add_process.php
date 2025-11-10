<?php
include '../config.php'; 
include '../includes/auth.php'; 

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang.");
}

if (empty($_POST['branch_name'])) {
    die('Nama Cabang wajib diisi.');
}

$branch_name = mysqli_real_escape_string($koneksi, $_POST['branch_name']);
$address = !empty($_POST['address']) ? mysqli_real_escape_string($koneksi, $_POST['address']) : NULL;
$phone = !empty($_POST['phone']) ? mysqli_real_escape_string($koneksi, $_POST['phone']) : NULL;
$email = !empty($_POST['email']) ? mysqli_real_escape_string($koneksi, $_POST['email']) : NULL;

$sql = "INSERT INTO branches (branch_name, address, phone, email)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $branch_name, $address, $phone, $email);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Cabang baru berhasil ditambahkan!'); window.location='" . BASE_URL . "modules/branches/list.php';</script>";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>