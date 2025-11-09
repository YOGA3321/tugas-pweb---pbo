<?php 
include 'layout/layout_header.php';

$where_clause = "";
$params = [];
$types = "";

if (isset($_GET['start_date']) && !empty($_GET['start_date']) && isset($_GET['end_date']) && !empty($_GET['end_date'])) {
    
    $start_date = $_GET['start_date'] . ' 00:00:00';
    $end_date = $_GET['end_date'] . ' 23:59:59';
    
    $where_clause = " WHERE tanggal_bayar BETWEEN ? AND ?";
    $params = [$start_date, $end_date];
    $types = "ss"; // Dua parameter string
}
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-file-earmark-bar-graph-fill"></i> Laporan Transaksi Selesai</h2>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title">Filter Laporan</h5>
        <form method="GET" action="laporan.php" class="row g-3">
            <div class="col-md-5">
                <label for="start_date" class="form-label">Dari Tanggal</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>" required>
            </div>
            <div class="col-md-5">
                <label for="end_date" class="form-label">Sampai Tanggal</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>
        <?php if (!empty($where_clause)): ?>
            <a href="laporan.php" class="btn btn-link btn-sm mt-2">Reset Filter</a>
        <?php endif; ?>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Trans.</th>
                        <th scope="col">Tgl. Bayar</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Layanan</th>
                        <th scope="col">Berat (Kg)</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_str = "SELECT * FROM laporan_transaksi" . $where_clause . " ORDER BY tanggal_bayar DESC";
                    $stmt = mysqli_prepare($koneksi, $query_str);
                    
                    if ($types) {
                        mysqli_stmt_bind_param($stmt, $types, ...$params);
                    }
                    
                    mysqli_stmt_execute($stmt);
                    $hasil = mysqli_stmt_get_result($stmt);
                    
                    $no = 1;
                    $total_pendapatan = 0;
                    
                    if (mysqli_num_rows($hasil) > 0) {
                        while($data = mysqli_fetch_assoc($hasil)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $no++ . "</th>";
                            echo "<td>" . htmlspecialchars($data['id_transaksi_lama']) . "</td>";
                            echo "<td>" . date('d M Y, H:i', strtotime($data['tanggal_bayar'])) . "</td>";
                            echo "<td>" . htmlspecialchars($data['nama_pelanggan']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['nama_layanan']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['berat']) . " Kg</td>";
                            echo "<td class='text-end'>Rp " . number_format($data['total_harga'], 0, ',', '.') . "</td>";
                            echo "</tr>";
                            
                            $total_pendapatan += $data['total_harga'];
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Tidak ada data laporan untuk periode ini.</td></tr>";
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                </tbody>
                <tfoot class="table-group-divider">
                    <tr class="fw-bold fs-5">
                        <td colspan="6" class="text-end">Total Pendapatan</td>
                        <td class="text-end text-success">Rp <?php echo number_format($total_pendapatan, 0, ',', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php
include 'layout/layout_footer.php';
?>