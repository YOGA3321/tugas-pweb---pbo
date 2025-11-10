<?php
// PERBAIKAN: Path salah, seharusnya 'config.php' bukan '../config.php'
include('config.php'); 
include('includes/auth.php'); 
include('includes/header.php'); 
?>

<h2 class="page-title">Dashboard</h2>

<p>Selamat datang di Sistem Manajemen Kursus BIMBINGKU.</p>
<p>Anda login sebagai: <strong><?php echo htmlspecialchars($user_role); ?></strong></p>

<div style="margin-top: 30px;">
    <h3>Menu Navigasi Anda:</h3>
    
    <?php 
    // Tampilkan menu berdasarkan peran
    switch ($user_role) {
        case 'Admin Pusat':
    ?>
            <a href="modules/classes/list.php" class="btn primary">Kelola Kelas</a>
            <a href="modules/users/list.php" class="btn primary">Kelola Pengguna</a>
            <a href="modules/branches/list.php" class="btn primary">Kelola Cabang</a>
            <a href="modules/payment/list.php" class="btn primary">Verifikasi Pembayaran</a>
            <a href="modules/info/list.php" class="btn primary">Info & Pengumuman</a>
    <?php
            break;
        
        case 'Pengajar':
    ?>
            <a href="modules/classes/list.php" class="btn primary">Kelas Saya</a>
            <a href="modules/attendance/list.php" class="btn primary">Presensi</a>
            <a href="modules/grades/list.php" class="btn primary">Input Nilai</a>
            <a href="modules/materials/list.php" class="btn primary">Upload Materi</a>
    <?php
            break;

        case 'Siswa':
    ?>
            <a href="modules/classes/list.php" class="btn primary">Kelas Saya</a>
            <a href="modules/grades/view.php" class="btn primary">Lihat Nilai</a>
            <a href="modules/materials/list.php" class="btn primary">Materi Belajar</a>
            <a href="modules/payment/history.php" class="btn primary">Riwayat Pembayaran</a>
    <?php
            break;
        
        default:
            echo "<p>Peran Anda tidak dikenali.</p>";
            break;
    }
    ?>
</div>

<?php 
include('includes/footer.php'); 
?>