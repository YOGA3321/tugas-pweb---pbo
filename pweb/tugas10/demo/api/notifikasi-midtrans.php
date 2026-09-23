<?php
include '../config.php'; // Load config dan library Midtrans

try {
    $notif = new \Midtrans\Notification();
} catch (Exception $e) {
    http_response_code(500);
    error_log('Gagal memproses notifikasi Midtrans: ' . $e->getMessage());
    exit('Server Error');
}

$transaction_status = $notif->transaction_status;
$payment_type = $notif->payment_type;
$order_id_full = $notif->order_id; // Ini akan berisi "ID-timestamp"
$fraud_status = $notif->fraud_status;

// Pecah order_id untuk mendapatkan ID transaksi asli (seperti di referensi Anda)
$order_id_parts = explode('-', $order_id_full);
$order_id = $order_id_parts[0]; // Ini ID transaksi kita, cth: 20251109514

// Verifikasi keamanan (opsional tapi disarankan)
// $signature_key = hash('sha512', $order_id . $notif->status_code . $notif->gross_amount . \Midtrans\Config::$serverKey);
// if ($notif->signature_key != $signature_key) {
//     http_response_code(403);
//     exit('Invalid Signature');
// }

// Hanya proses jika pembayaran 'settlement' (berhasil) atau 'capture' (kartu kredit)
if ($transaction_status == 'capture' || $transaction_status == 'settlement') {
    
    // 1. Cek dulu apakah transaksi masih ada di tabel 'transaksi'
    $query_get = "SELECT t.*, p.nama AS nama_pelanggan, l.nama_layanan 
                  FROM transaksi t
                  JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
                  JOIN layanan l ON t.id_layanan = l.id_layanan
                  WHERE t.id_transaksi = ? AND (t.status = 'Selesai' OR t.status = 'Proses') LIMIT 1"; // Status 'Selesai'
                  
    $stmt_get = mysqli_prepare($koneksi, $query_get);
    mysqli_stmt_bind_param($stmt_get, 's', $order_id);
    mysqli_stmt_execute($stmt_get);
    $hasil_get = mysqli_stmt_get_result($stmt_get);
    
    // Jika data ditemukan (belum diproses)
    if (mysqli_num_rows($hasil_get) > 0) {
        $data = mysqli_fetch_assoc($hasil_get);
        mysqli_stmt_close($stmt_get);
        
        $tanggal_bayar = date('Y-m-d H:i:s');
        $metode_pembayaran = 'Midtrans (' . $payment_type . ')';
        $tanggal_selesai = $data['tanggal_selesai'] ?? $tanggal_bayar; // Jika belum selesai, anggap selesai saat bayar

        mysqli_begin_transaction($koneksi);
        try {
            // 2. Salin ke Laporan
            $query_insert = "INSERT INTO laporan_transaksi 
                                (id_transaksi_lama, id_pelanggan, id_layanan, nama_pelanggan, nama_layanan, 
                                tanggal_masuk, tanggal_selesai, tanggal_bayar, berat, total_harga, metode_pembayaran)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt_insert = mysqli_prepare($koneksi, $query_insert);
            mysqli_stmt_bind_param($stmt_insert, 'siisssssdds', 
                $data['id_transaksi'], $data['id_pelanggan'], $data['id_layanan'],
                $data['nama_pelanggan'], $data['nama_layanan'], $data['tanggal_masuk'],
                $tanggal_selesai, $tanggal_bayar, $data['berat'],
                $data['total_harga'], $metode_pembayaran
            );
            
            if (!mysqli_stmt_execute($stmt_insert)) {
                throw new Exception("Gagal menyimpan ke laporan: " . mysqli_stmt_error($stmt_insert));
            }
            mysqli_stmt_close($stmt_insert);

            // 3. Hapus dari Transaksi Aktif
            $query_delete = "DELETE FROM transaksi WHERE id_transaksi = ?";
            $stmt_delete = mysqli_prepare($koneksi, $query_delete);
            mysqli_stmt_bind_param($stmt_delete, 's', $order_id);
            
            if (!mysqli_stmt_execute($stmt_delete)) {
                throw new Exception("Gagal menghapus dari transaksi: " . mysqli_stmt_error($stmt_delete));
            }
            mysqli_stmt_close($stmt_delete);

            // 4. Sukses
            mysqli_commit($koneksi);
            
        } catch (Exception $e) {
            mysqli_rollback($koneksi);
            error_log('Gagal proses DB notifikasi Midtrans: ' . $e->getMessage());
        }
    }
}

// Kirim respons 200 OK ke Midtrans
http_response_code(200);
echo "OK";
?>