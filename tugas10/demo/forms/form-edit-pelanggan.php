<?php
include '../layout/layout_header.php';

if(!isset($_GET['id'])){
    mysqli_close($koneksi); 
    header('location: pelanggan.php');
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);

$data = mysqli_fetch_assoc($hasil);
if(!$data){
    echo "Data tidak ditemukan!";
    mysqli_stmt_close($stmt);
    include 'layout_footer.php';
    exit;
}
mysqli_stmt_close($stmt);
?>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Form Edit Pelanggan</h4>
            </div>
            <div class="card-body">
                <form action="../proses/proses-edit-pelanggan.php" method="POST">
                    
                    <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>">
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($data['alamat']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. Handphone</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($data['no_hp']); ?>">
                    </div>
                    
                    <hr>
                    
                    <div class="text-end">
                        <a href="../pelanggan.php" class="btn btn-secondary me-2">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save-fill"></i> Simpan Perubahan
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
    
    // Cek jika ada parameter 'status'
    if (status === 'gagal_nama_duplikat') {
        Swal.fire({
            title: 'Gagal!',
            text: 'Nama pelanggan tersebut sudah dipakai oleh data lain.',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(() => {
            // Bersihkan URL dari parameter 'status'
            const cleanURL = window.location.protocol + "//" + window.location.host + window.location.pathname + "?id=" + <?php echo $id; ?>;
            window.history.replaceState({}, document.title, cleanURL);
        });
    }
});
</script>

<?php
include '../layout/layout_footer.php';
?>