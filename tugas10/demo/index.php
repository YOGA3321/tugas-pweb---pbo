<?php 
// 1. Panggil Header (sudah ada session check di dalamnya)
include 'layout_header.php';
?>

<div class="alert alert-success">
    <h4 class="alert-heading">Login Berhasil!</h4>
    <p>Halo <b><?php echo $username; ?></b>, Anda telah login sebagai <b><?php echo $role; ?></b>.</p>
    <hr>
    <p class="mb-0">Selamat datang di Dashboard LaundryCrafty.</p>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <h2>Ringkasan</h2>
        <p>Nanti di sini kita akan letakkan konten dashboard, statistik, dan lain-lain.</p>
    </div>
</div>

<?php 
// 2. Panggil Footer
include 'layout_footer.php';
?>