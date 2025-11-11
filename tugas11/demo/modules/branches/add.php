<?php
include('../../config.php'); 
include('../../includes/auth.php');

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang. Hanya Admin Pusat.");
}

include('../../includes/header');
?>

<h2 class="page-title">Tambah Cabang Baru</h2>
<a href="<?php echo BASE_URL; ?>modules/branches/list.php" style="color: var(--muted);">&larr; Kembali ke Daftar Cabang</a>

<form id="addBranchForm" action="<?php echo BASE_URL; ?>prosses/branch_add_process.php" method="POST" style="margin-top: 20px;">
    
    <div class="row">
        <div class="col-full">
            <label for="branch_name">Nama Cabang <span class="req">*</span></label>
            <input id="branch_name" name="branch_name" type="text" required placeholder="Cth: BIMBINGKU Cabang Surabaya">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="phone">Nomor Telepon</label>
            <input id="phone" name="phone" type="tel" placeholder="031-xxxxxx">
        </div>
        <div class="col">
            <label for="email">Email Cabang</label>
            <input id="email" name="email" type="email" placeholder="surabaya@bimbingku.com">
        </div>
    </div>

    <div class="row">
        <div class="col-full">
            <label for="address">Alamat Lengkap</label>
            <textarea id="address" name="address" rows="3" placeholder="Jl. Raya ITS No. 1, Surabaya"></textarea>
        </div>
    </div>

    <div class="form-actions" style="margin-top: 15px;">
        <button type="submit" class="btn primary">Simpan Cabang</button>
    </div>
</form>

<?php
include('../../includes/footer.php');
?>