<?php
include '../layout/layout_header.php';

if(!isset($_GET['id'])){
    mysqli_close($koneksi); 
    header('location: transaksi.php');
    exit;
}
$id_transaksi = $_GET['id'];

$query_trans = "SELECT * FROM transaksi WHERE id_transaksi = ?";
$stmt_trans = mysqli_prepare($koneksi, $query_trans);
mysqli_stmt_bind_param($stmt_trans, 's', $id_transaksi);
mysqli_stmt_execute($stmt_trans);
$hasil_trans = mysqli_stmt_get_result($stmt_trans);
$data = mysqli_fetch_assoc($hasil_trans);

if(!$data){
    echo "Data transaksi tidak ditemukan!";
    mysqli_stmt_close($stmt_trans);
    include 'layout_footer.php';
    exit;
}
mysqli_stmt_close($stmt_trans);
$pelanggan_query = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY nama ASC");
$layanan_query = mysqli_query($koneksi, "SELECT * FROM layanan ORDER BY nama_layanan ASC");
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Form Edit Transaksi (TRX-<?php echo $data['id_transaksi']; ?>)</h4>
            </div>
            <div class="card-body">
                <form action="../proses/proses-edit-transaksi.php" method="POST">
                    
                    <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>">
                    
                    <div class="row mb-3">
                        <label for="id_pelanggan" class="col-md-3 col-form-label">Pelanggan</label>
                        <div class="col-md-9">
                            <select class="form-select" id="id_pelanggan" name="id_pelanggan" required>
                                <option value="" disabled>-- Pilih Pelanggan --</option>
                                <?php while($p = mysqli_fetch_assoc($pelanggan_query)): ?>
                                    <option value="<?php echo $p['id_pelanggan']; ?>" 
                                        <?php echo ($p['id_pelanggan'] == $data['id_pelanggan']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($p['nama']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="id_layanan" class="col-md-3 col-form-label">Layanan</label>
                        <div class="col-md-9">
                            <select class="form-select" id="id_layanan" name="id_layanan" required>
                                <option value="" disabled>-- Pilih Layanan --</option>
                                <?php mysqli_data_seek($layanan_query, 0); ?>
                                <?php while($l = mysqli_fetch_assoc($layanan_query)): ?>
                                    <option value="<?php echo $l['id_layanan']; ?>" 
                                            data-harga="<?php echo $l['harga_per_kg']; ?>"
                                            <?php echo ($l['id_layanan'] == $data['id_layanan']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($l['nama_layanan']); ?> (Rp <?php echo number_format($l['harga_per_kg']); ?>/kg)
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="berat" class="col-md-3 col-form-label">Berat (Kg)</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="berat" name="berat" value="<?php echo htmlspecialchars($data['berat']); ?>" step="0.1" min="0.1" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="total_harga" class="col-md-3 col-form-label">Total Harga (Rp)</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="total_harga" name="total_harga" value="<?php echo htmlspecialchars($data['total_harga']); ?>" readonly style="background-color: #e9ecef;">
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-9 offset-md-3">
                            <a href="../transaksi.php" class="btn btn-secondary me-2">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const layananSelect = document.getElementById('id_layanan');
        const beratInput = document.getElementById('berat');
        const totalHargaInput = document.getElementById('total_harga');

        function hitungTotal() {
            const selectedLayanan = layananSelect.options[layananSelect.selectedIndex];
            const hargaPerKg = parseFloat(selectedLayanan.getAttribute('data-harga')) || 0;
            const berat = parseFloat(beratInput.value) || 0;
            const total = hargaPerKg * berat;
            totalHargaInput.value = Math.round(total);
        }
        hitungTotal(); 

        layananSelect.addEventListener('change', hitungTotal);
        beratInput.addEventListener('input', hitungTotal);
    });
</script>