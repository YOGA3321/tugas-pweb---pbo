<?php
include '../layout/layout_header.php';

if(!isset($_GET['id'])){
    mysqli_close($koneksi); 
    header('location: layanan.php');
    exit;
}
$id = $_GET['id'];

$query = "SELECT * FROM layanan WHERE id_layanan = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($hasil);

if(!$data){
    echo "Data layanan tidak ditemukan!";
    mysqli_stmt_close($stmt);
    include 'layout_footer.php';
    exit;
}
mysqli_stmt_close($stmt);
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Form Edit Layanan</h4>
            </div>
            <div class="card-body">
                <form action="../proses/proses-edit-layanan.php" method="POST">
                    
                    <input type="hidden" name="id_layanan" value="<?php echo $data['id_layanan']; ?>">
                    
                    <div class="row mb-3">
                        <label for="nama_layanan" class="col-md-3 col-form-label">Nama Layanan</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" value="<?php echo htmlspecialchars($data['nama_layanan']); ?>" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="harga_per_kg" class="col-md-3 col-form-label">Harga per Kg (Rp)</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="harga_per_kg" name="harga_per_kg" value="<?php echo htmlspecialchars($data['harga_per_kg']); ?>" step="100" min="0" required>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-9 offset-md-3">
                            <a href="../layanan.php" class="btn btn-secondary me-2">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill"></i> Simpan Perubahan
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