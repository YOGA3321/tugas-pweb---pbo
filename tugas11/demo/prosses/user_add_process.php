<?php
include '../config.php'; 
include '../includes/auth.php'; 

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang.");
}

$required = ['name', 'email', 'password', 'role_id', 'status'];
foreach ($required as $f) {
    if (empty($_POST[$f])) {
        die('Field ' . $f . ' wajib diisi.');
    }
}

$name = mysqli_real_escape_string($koneksi, $_POST['name']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$role_id = intval($_POST['role_id']);
$status = mysqli_real_escape_string($koneksi, $_POST['status']);
$branch_id = !empty($_POST['branch_id']) ? intval($_POST['branch_id']) : NULL;
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password, role_id, branch_id, status, created_at)
        VALUES (?, ?, ?, ?, ?, ?, NOW())";

$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "sssiis", $name, $email, $password, $role_id, $branch_id, $status);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Pengguna baru berhasil ditambahkan!'); window.location='" . BASE_URL . "modules/users/list.php';</script>";
} else {
    if (mysqli_errno($koneksi) == 1062) { // 1062 = duplicate entry
         echo "<script>alert('Error: Email " . $email . " sudah terdaftar. Gunakan email lain.'); window.history.back();</script>";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>