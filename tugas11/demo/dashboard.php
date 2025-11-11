<?php
include('config.php'); 
include('includes/auth.php'); 

$stats = [
    'total_siswa' => 0,
    'total_kelas' => 0,
    'total_cabang' => 0
];

if ($user_role == 'Admin Pusat') {
    $result_siswa = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM students WHERE status = 'Diterima'");
    $stats['total_siswa'] = mysqli_fetch_assoc($result_siswa)['total'];

    $result_kelas = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM classes WHERE status = 'aktif'");
    $stats['total_kelas'] = mysqli_fetch_assoc($result_kelas)['total'];

    $result_cabang = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM branches");
    $stats['total_cabang'] = mysqli_fetch_assoc($result_cabang)['total'];
}
include('includes/header.php'); 
?>

<h2 class="page-title">Dashboard</h2>
<p style="margin-top: -20px; color: var(--muted);">Selamat datang di Sistem Manajemen Kursus BIMBINGKU.</p>

<?php
if ($user_role == 'Admin Pusat'): 
?>
    <div class="stat-cards">
        <div class="stat-card">
            <h3 class="value"><?php echo $stats['total_siswa']; ?></h3>
            <p class="label">Total Siswa Aktif</p>
        </div>
        <div class="stat-card">
            <h3 class="value"><?php echo $stats['total_kelas']; ?></h3>
            <p class="label">Total Kelas Aktif</p>
        </div>
        <div class="stat-card">
            <h3 class="value"><?php echo $stats['total_cabang']; ?></h3>
            <p class="label">Total Cabang</p>
        </div>
    </div>
<?php endif; ?>

<div style="margin-top: 30px;">
    <h3>Selamat Datang, <?php echo htmlspecialchars($user_name); ?>!</h3>
    <p>Anda login sebagai: <strong><?php echo htmlspecialchars($user_role); ?></strong></p>
    <p>Silakan pilih menu di sidebar kiri untuk mulai mengelola sistem.</p>
</div>

<?php 
mysqli_close($koneksi);
include('includes/footer.php'); 
?>