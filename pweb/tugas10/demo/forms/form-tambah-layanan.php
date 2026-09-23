<?php
include '../layout/layout_header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8"> <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-plus-circle-fill"></i> Form Tambah Layanan Baru</h4>
            </div>
            <div class="card-body">
                <form action="../proses/proses-tambah-layanan.php" method="POST">
                    
                    <div class="row mb-3">
                        <label for="nama_layanan" class="col-md-3 col-form-label">Nama Layanan</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Cth: Cuci Setrika Kilat" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="harga_per_kg" class="col-md-3 col-form-label">Harga per Kg (Rp)</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="harga_per_kg" name="harga_per_kg" placeholder="Cth: 8000" step="100" min="0" required>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-9 offset-md-3">
                            <a href="../layanan.php" class="btn btn-secondary me-2">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill"></i> Simpan Data
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../layout/layout_footer.php';
?>