<?php
include('../../config.php'); 
include('../../includes/auth.php');

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang. Hanya Admin Pusat.");
}

$roles = mysqli_query($koneksi, "SELECT role_id, role_name FROM roles");
$branches = mysqli_query($koneksi, "SELECT branch_id, branch_name FROM branches");

include('../../includes/header.php');
?>

<h2 class="page-title">Tambah Pengguna Baru</h2>
<a href="<?php echo BASE_URL; ?>modules/users/list" style="color: var(--muted);">&larr; Kembali ke Daftar Pengguna</a>

<form id="addUserForm" action="<?php echo BASE_URL; ?>prosses/user_add_process.php" method="POST" style="margin-top: 20px;">
    
    <div class="row">
        <div class="col">
            <label for="name">Nama Lengkap <span class="req">*</span></label>
            <input id="name" name="name" type="text" required placeholder="Cth: Budi Hartono">
        </div>
        <div class="col">
            <label for="email">Email <span class="req">*</span></label>
            <input id="email" name="email" type="email" required placeholder="email@example.com">
        </div>
    </div>

    <div class="row">
        <div class="col-full">
            <label for="password">Password <span class="req">*</span></label>
            <input id="password" name="password" type="password" required placeholder="Minimal 8 karakter">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="role_id">Pilih Role <span class="req">*</span></label>
            <select id="role_id" name="role_id" required>
                <option value="">-- Pilih Role --</option>
                <?php while($r = mysqli_fetch_assoc($roles)) {
                    if ($r['role_name'] != 'Admin Pusat' && $r['role_name'] != 'Siswa') {
                        echo "<option value='{$r['role_id']}'>".htmlspecialchars($r['role_name'])."</option>";
                    }
                } ?>
            </select>
        </div>
        <div class="col">
            <label for="branch_id">Pilih Cabang (Opsional)</label>
            <select id="branch_id" name="branch_id">
                <option value="">-- Tidak Terkait Cabang --</option>
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
        <button type="submit" class="btn primary">Simpan Pengguna</button>
    </div>
</form>

<?php
mysqli_close($koneksi);
include('../../includes/footer.php');
?>