<?php
// PERBAIKAN: Panggil config.php PERTAMA dan dengan path yang BENAR
include('../../config.php'); 
include('../../includes/auth.php');

// Hanya Admin Pusat atau Admin Cabang yang boleh akses
if ($user_role != 'Admin Pusat' && $user_role != 'Admin Cabang') {
    die("Akses dilarang.");
}

// PERBAIKAN: Gunakan $koneksi
$teachers = mysqli_query($koneksi, "SELECT u.user_id, u.name FROM users u JOIN roles r ON u.role_id = r.role_id WHERE r.role_name = 'Pengajar'");
$branches = mysqli_query($koneksi, "SELECT branch_id, branch_name FROM branches");

include('../../includes/header.php');
?>

<h2 class="page-title">Tambah Kelas Baru</h2>
<a href="<?php echo BASE_URL; ?>modules/classes/list.php" style="color: var(--muted);">&larr; Kembali ke Daftar Kelas</a>

<form id="addClassForm" action="<?php echo BASE_URL; ?>prosses/class_add_process.php" method="POST" style="margin-top: 20px;">
    
    <div class="row">
        <div class="col-full">
            <label for="class_name">Nama Kelas <span class="req">*</span></label>
            <input id="class_name" name="class_name" type="text" required placeholder="Cth: Matematika (UTBK)">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="teacher_id">Pilih Pengajar <span class="req">*</span></label>
            <select id="teacher_id" name="teacher_id" required>
                <option value="">-- Pilih Pengajar --</option>
                <?php while($t = mysqli_fetch_assoc($teachers)) {
                    echo "<option value='{$t['user_id']}'>".htmlspecialchars($t['name'])."</option>";
                } ?>
            </select>
        </div>
        <div class="col">
            <label for="branch_id">Pilih Cabang <span class="req">*</span></label>
            <select id="branch_id" name="branch_id" required>
                <option value="">-- Pilih Cabang --</option>
                 <?php while($b = mysqli_fetch_assoc($branches)) {
                    echo "<option value='{$b['branch_id']}'>".htmlspecialchars($b['branch_name'])."</option>";
                } ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-full">
            <label for="status">Status <span class="req">*</span></label>
            <select id="status" name="status" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>
    </div>

    <div class="form-actions" style="margin-top: 15px;">
        <button type="submit" class="btn primary">Simpan Kelas</button>
    </div>
</form>

<?php
mysqli_close($koneksi); // PERBAIKAN: Gunakan $koneksi
include('../../includes/footer.php');
?>