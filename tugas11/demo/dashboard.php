<?php
include('config.php'); 
include('includes/auth.php'); 
include('includes/header.php'); 
?>

<h2 class="page-title">Dashboard</h2>

<p>Selamat datang di Sistem Manajemen Kursus BIMBINGKU.</p>
<p>Anda login sebagai: <strong><?php echo htmlspecialchars($user_role); ?></strong></p>

<div style="margin-top: 30px;">
    <h3>Selamat Datang!</h3>
    <p>Silakan pilih menu di sidebar kiri untuk mulai mengelola sistem.</p>
    
    </div>

<?php 
include('includes/footer.php'); 
?>