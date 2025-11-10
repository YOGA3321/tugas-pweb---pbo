<?php
session_start();
// config.php harus di-include SEBELUM file ini
if (!isset($_SESSION['user_id'])) {
    // PERBAIKAN: Redirect menggunakan BASE_URL
    header("Location: " . BASE_URL . "login.php");
    exit();
}

// Simpan data session ke variabel agar mudah dipakai
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_role = $_SESSION['role']; 
?>