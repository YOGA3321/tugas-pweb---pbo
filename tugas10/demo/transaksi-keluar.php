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

    let transactionTokens = {};

    // 2. Hapus fungsi konfirmasiBayar(event, id, total) yang lama,
    //    karena sudah diganti Bayar Online

    // 3. Buat fungsi terpisah untuk callback
    function getSnapCallbacks(id_transaksi) {
        return {
            onSuccess: function(result){
                Swal.fire('Sukses!', 'Pembayaran berhasil. Data sedang diproses.', 'success')
                    .then(() => location.reload()); // Muat ulang halaman agar transaksi hilang
            },
            onPending: function(result){
                Swal.fire('Pending', 'Menunggu pembayaran Anda.', 'info');
            },
            onError: function(result){
                Swal.fire('Gagal', 'Pembayaran dibatalkan atau gagal.', 'error');
                // Hapus token yang error agar bisa coba buat baru
                transactionTokens[id_transaksi] = null;
            },
            onClose: function(){
                Swal.fire({
                    title: 'Info',
                    text: 'Anda menutup popup pembayaran. Klik "Bayar Online" lagi untuk membukanya kembali.',
                    icon: 'warning',
                    timer: 3000,
                    showConfirmButton: false
                });
                // Jangan hapus token di sini, agar bisa dibuka lagi
            }
        };
    }

    // 4. Modifikasi fungsi bayarViaMidtrans
    function bayarViaMidtrans(event, id_transaksi, total) {
        event.preventDefault();

        // 4.1. Cek apakah kita sudah punya token untuk ID ini
        if (transactionTokens[id_transaksi]) {
            // Jika ADA, langsung pakai token yang ada dan buka popup
            console.log("Membuka ulang popup dengan token tersimpan.");
            window.snap.pay(transactionTokens[id_transaksi], getSnapCallbacks(id_transaksi));
            return; // Selesai
        }

        // 4.2. Jika BELUM ADA, tampilkan loading
        Swal.fire({
            title: 'Membuat Sesi Pembayaran...',
            text: 'Harap tunggu, sistem sedang menghubungkan ke Midtrans.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // 4.3. Minta token baru ke backend
        fetch(`api/buat-payment-token.php?id=${id_transaksi}`)
            .then(response => response.json())
            .then(data => {
                Swal.close(); // Tutup loading

                if (data.error) {
                    Swal.fire('Error!', data.error, 'error');
                    return;
                }

                if (data.token) {
                    // 4.4. SIMPAN token yang baru didapat
                    console.log("Token baru didapat dan disimpan.");
                    transactionTokens[id_transaksi] = data.token;
                    
                    // 4.5. Buka popup Midtrans Snap
                    window.snap.pay(data.token, getSnapCallbacks(id_transaksi));
                }
            })
            .catch(err => {
                Swal.close();
                Swal.fire('Error Koneksi', 'Tidak dapat terhubung ke server.', 'error');
            });
    }
</script>