<?php 
include 'layout/layout_header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-cash-coin"></i> Transaksi Keluar (Siap Bayar)</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID Trans.</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Tgl. Selesai</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Hanya tampilkan yang statusnya 'Selesai' (siap bayar)
                    $query = "SELECT t.*, p.nama AS nama_pelanggan 
                            FROM transaksi t
                            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
                            WHERE t.status = 'Selesai'
                            ORDER BY t.tanggal_selesai ASC";
                    
                    $hasil = mysqli_query($koneksi, $query);
                    
                    if (mysqli_num_rows($hasil) > 0) {
                        while($data = mysqli_fetch_assoc($hasil)) {
                            $status_badge = 'bg-success'; // Pasti 'Selesai'

                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($data['id_transaksi']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['nama_pelanggan']) . "</td>";
                            echo "<td>" . date('d M Y, H:i', strtotime($data['tanggal_selesai'])) . "</td>";
                            echo "<td>Rp " . number_format($data['total_harga'], 0, ',', '.') . "</td>";
                            echo "<td><span class='badge " . $status_badge . "'>" . htmlspecialchars($data['status']) . "</span></td>";
                            
                            // Aksi: Bayar & Ambil
                            echo "<td>";
                            echo "<a href='#' class='btn btn-info btn-sm mb-2' 
                                    onclick=\"bayarViaMidtrans(event, '" . $data['id_transaksi'] . "', '" . htmlspecialchars($data['total_harga']) . "')\">
                                    <i class='bi bi-credit-card'></i> Bayar Online
                                </a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Tidak ada transaksi yang siap dibayar.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" 
        data-client-key="<?php echo \Midtrans\Config::$clientKey; ?>"></script>

<?php 
include 'layout/layout_footer.php';
?>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    if (status === 'sukses_bayar') {
        Swal.fire({ title: 'Sukses!', text: 'Transaksi telah dibayar dan dipindahkan ke laporan.', icon: 'success', timer: 2000, showConfirmButton: false });
    }
    
    if (status) {
        const cleanURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.replaceState({}, document.title, cleanURL);
    }

    // Fungsi konfirmasi Pembayaran
    function konfirmasiBayar(event, id, total) {
        event.preventDefault();
        const url = event.currentTarget.href;
        
        // Format 'total' menjadi Rupiah
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });
        const totalRp = formatter.format(total);

        Swal.fire({
            title: 'Konfirmasi Pembayaran',
            html: `Pelanggan akan membayar transaksi <b>${id}</b> sejumlah <b>${totalRp}</b>? <br><br> Aksi ini akan memindahkan data ke laporan dan tidak bisa dibatalkan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Sudah Dibayar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    function bayarViaMidtrans(event, id_transaksi, total) {
        event.preventDefault();

        // Tampilkan loading
        Swal.fire({
            title: 'Membuat Sesi Pembayaran...',
            text: 'Harap tunggu, sistem sedang menghubungkan ke Midtrans.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // 1. Minta token ke backend (api/buat-payment-token.php)
        fetch(`api/buat-payment-token.php?id=${id_transaksi}`)
            .then(response => response.json())
            .then(data => {
                Swal.close(); // Tutup loading

                if (data.error) {
                    Swal.fire('Error!', data.error, 'error');
                    return;
                }

                if (data.token) {
                    // 2. Buka popup Midtrans Snap
                    window.snap.pay(data.token, {
                        onSuccess: function(result){
                            Swal.fire('Sukses!', 'Pembayaran berhasil. Data sedang diproses.', 'success')
                                .then(() => location.reload());
                        },
                        onPending: function(result){
                            Swal.fire('Pending', 'Menunggu pembayaran Anda.', 'info');
                        },
                        onError: function(result){
                            Swal.fire('Gagal', 'Pembayaran dibatalkan atau gagal.', 'error');
                        },
                        onClose: function(){
                            Swal.fire('Info', 'Anda menutup popup pembayaran.', 'warning');
                        }
                    });
                }
            })
            .catch(err => {
                Swal.close();
                Swal.fire('Error Koneksi', 'Tidak dapat terhubung ke server.', 'error');
            });
    }
</script>