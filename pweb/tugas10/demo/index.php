<?php
include 'layout/layout_header.php';
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
include 'layout/layout_footer.php';
?>