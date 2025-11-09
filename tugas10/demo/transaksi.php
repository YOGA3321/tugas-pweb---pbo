<?php
include 'layout/layout_header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-hourglass-split"></i> Daftar Cucian Aktif (Proses)</h2>
    <a href="forms/form-tambah-transaksi" class="btn btn-primary">
        <i class="bi bi-plus-circle-fill"></i> Catat Transaksi Baru
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Trans.</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Layanan</th>
                        <th scope="col">Tgl. Masuk</th>
                        <th scope="col">Berat (Kg)</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT t.*, p.nama AS nama_pelanggan, l.nama_layanan 
                            FROM transaksi t
                            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
                            JOIN layanan l ON t.id_layanan = l.id_layanan
                            WHERE t.status = 'Proses'
                            ORDER BY t.tanggal_masuk ASC";
                    
                    $hasil = mysqli_query($koneksi, $query);
                    $no = 1;
                    
                    if (mysqli_num_rows($hasil) > 0) {
                        while($data = mysqli_fetch_assoc($hasil)) {
                            $status_badge = 'bg-warning text-dark';

                            echo "<tr>";
                            echo "<th scope='row'>" . $no++ . "</th>";
                            echo "<td>" . htmlspecialchars($data['id_transaksi']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['nama_pelanggan']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['nama_layanan']) . "</td>";
                            echo "<td>" . date('d M Y, H:i', strtotime($data['tanggal_masuk'])) . "</td>";
                            echo "<td>" . htmlspecialchars($data['berat']) . " Kg</td>";
                            echo "<td>Rp " . number_format($data['total_harga'], 0, ',', '.') . "</td>";
                            echo "<td><span class='badge " . $status_badge . "'>" . htmlspecialchars($data['status']) . "</span></td>";
                            echo "<td>";
                            
                            $id_trans = $data['id_transaksi'];
                            $nama_trans = htmlspecialchars($id_trans);

                            echo "<a href='forms/proses-update-status?id=" . $id_trans . "&status=Selesai' class='btn btn-success btn-sm me-2 mb-2' style='width: 110px;'
                                    onclick=\"konfirmasiUpdateStatus(event, '" . $nama_trans . "', 'Selesai', 'menyelesaikan');\">
                                    <i class='bi bi-check-circle'></i> Selesaikan
                                </a>";
                                
                            echo "<a href='forms/form-edit-transaksi?id=" . $id_trans . "' class='btn btn-warning btn-sm me-2 mb-2' style='width: 85px;'><i class='bi bi-pencil-square'></i> Edit</a>";
                            
                            echo "<a href='proses/hapus-transaksi.php?id=<?php echo $id_trans; ?>'" . $id_trans . "' class='btn btn-danger btn-sm mb-2' style='width: 85px;' 
                                    onclick=\"konfirmasiHapus(event, '" . $nama_trans . "', '" . $id_trans . "')\">
                                    <i class='bi bi-trash-fill'></i> Hapus
                                </a>";
                            
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>Tidak ada cucian yang sedang diproses.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include 'layout/layout_footer.php';
?>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    let timer = 2000;

    if (status === 'sukses_tambah') {
        Swal.fire({ title: 'Sukses!', text: 'Transaksi baru berhasil dicatat.', icon: 'success', timer: timer, showConfirmButton: false });
    } else if (status === 'sukses_edit') {
        Swal.fire({ title: 'Sukses!', text: 'Data transaksi berhasil diperbarui.', icon: 'success', timer: timer, showConfirmButton: false });
    } else if (status === 'sukses_hapus') {
        Swal.fire({ title: 'Terhapus!', text: 'Data transaksi telah dihapus.', icon: 'warning', timer: timer, showConfirmButton: false });
    } else if (status === 'sukses_update') {
        Swal.fire({ title: 'Sukses!', text: 'Status transaksi berhasil diperbarui.', icon: 'success', timer: timer, showConfirmButton: false });
    }
    
    if (status) {
        const cleanURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.replaceState({}, document.title, cleanURL);
    }

    // Fungsi konfirmasi Hapus (sudah ada)
    function konfirmasiHapus(event, nama, id) {
        event.preventDefault(); 
        const url = event.currentTarget.href; // Ambil URL dari link

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menghapus data pelanggan: " + nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // Gunakan URL dari link
            }
        });
    }

    function konfirmasiUpdateStatus(event, nama, status, aksi) {
        event.preventDefault();
        const url = event.currentTarget.href; // Ambil URL dari tombol

        Swal.fire({
            title: 'Konfirmasi Aksi',
            text: "Anda yakin ingin " + aksi + " transaksi: " + nama + "?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Lanjutkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>