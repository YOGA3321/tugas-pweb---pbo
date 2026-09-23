<?php
include('../../config.php'); 
include('../../includes/auth.php');

// Hanya Admin Pusat
if ($user_role != 'Admin Pusat') {
    die("Akses dilarang.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Buat Pengumuman Baru</h2>
<a href="<?php echo BASE_URL; ?>modules/info/list" style="color: var(--muted);">&larr; Kembali ke Daftar Pengumuman</a>

<form id="addInfoForm" action="<?php echo BASE_URL; ?>prosses/info_add_process.php" method="POST" style="margin-top: 20px;">
    
    <div class="row">
        <div class="col-full">
            <label for="title">Judul Pengumuman <span class="req">*</span></label>
            <input id="title" name="title" type="text" required placeholder="Cth: Jadwal Ujian Tengah Semester">
        </div>
    </div>

    <div class="row">
        <div class="col-full">
            <label for="content">Isi Pengumuman <span class="req">*</span></label>
            <textarea id="content" name="content" rows="6" required placeholder="Isi detail pengumuman..."></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-full">
            <label for="target_role">Target Pengumuman <span class="req">*</span></label>
            <select id="target_role" name="target_role" required>
                <option value="Semua">Semua</option>
                <option value="Siswa">Siswa</option>
                <option value="Pengajar">Pengajar</option>
            </select>
        </div>
    </div>

    <div class="form-actions" style="margin-top: 15px;">
        <button type="submit" class="btn primary">Publikasikan</button>
    </div>
</form>

<?php
include('../../includes/footer.php');
?>