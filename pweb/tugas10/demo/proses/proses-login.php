<?php
session_start();
include '../config.php';
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$data = mysqli_query($koneksi, $query);
$cek = mysqli_num_rows($data);

if($cek > 0){
    $hasil = mysqli_fetch_assoc($data);
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $hasil['role'];
    $_SESSION['status'] = "login";
    header("location:" . BASE_URL . "index.php");

} else {
    header("location:" . BASE_URL . "login.php?pesan=gagal");
}
?>