<?php
include '../layout/layout_header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-person-plus-fill"></i> Form Tambah Pelanggan Baru</h4>
            </div>
            <div class="card-body">
                <form action="../proses/proses-tambah-pelanggan.php" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pelanggan" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. Handphone</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Contoh: 08123456789">
                    </div>
                    
                    <hr>
                    
                    <div class="text-end">
                        <a href="../pelanggan.php" class="btn btn-secondary me-2">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save-fill"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    if (status === 'gagal_nama_duplikat') {
        Swal.fire({
            title: 'Gagal!',
            text: 'Nama pelanggan tersebut sudah terdaftar. Silakan gunakan nama lain.',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(() => {
            const cleanURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
            window.history.replaceState({}, document.title, cleanURL);
        });
    }
});
</script>

<?php
include '../layout/layout_footer.php';
?>