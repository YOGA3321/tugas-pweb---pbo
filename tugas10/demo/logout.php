<?php 
// 1. Mulai session
session_start();

// 2. Hapus semua data session
session_destroy();

// 3. Alihkan ke halaman login dengan pesan
header("location:login.php?pesan=logout");
?>