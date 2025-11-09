<?php
session_start();
include '../config.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login!");
}

if(!isset($_GET['id'])){
    die("ID Transaksi tidak ditemukan.");
}

$id_transaksi = $_GET['id'];
$tanggal_bayar = date('Y-m-d H:i:s');
$metode_pembayaran = 'Tunai';
mysqli_begin_transaction($koneksi);

try {
    $query_get = "SELECT t.*, p.nama AS nama_pelanggan, l.nama_layanan 
                FROM transaksi t
                JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
                JOIN layanan l ON t.id_layanan = l.id_layanan
                WHERE t.id_transaksi = ? AND t.status = 'Selesai' LIMIT 1";
                
    $stmt_get = mysqli_prepare($koneksi, $query_get);
    mysqli_stmt_bind_param($stmt_get, 's', $id_transaksi);
    mysqli_stmt_execute($stmt_get);
    $hasil_get = mysqli_stmt_get_result($stmt_get);
    
    if (mysqli_num_rows($hasil_get) == 0) {
        throw new Exception("Transaksi tidak ditemukan atau belum selesai.");
    }
    $data = mysqli_fetch_assoc($hasil_get);
    mysqli_stmt_close($stmt_get);
    $query_insert = "INSERT INTO laporan_transaksi 
                        (id_transaksi_lama, id_pelanggan, id_layanan, nama_pelanggan, nama_layanan, 
                        tanggal_masuk, tanggal_selesai, tanggal_bayar, berat, total_harga, metode_pembayaran)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt_insert = mysqli_prepare($koneksi, $query_insert);
    mysqli_stmt_bind_param($stmt_insert, 'siisssssdds', 
        $data['id_transaksi'],
        $data['id_pelanggan'],
        $data['id_layanan'],
        $data['nama_pelanggan'],
        $data['nama_layanan'],
        $data['tanggal_masuk'],
        $data['tanggal_selesai'],
        $tanggal_bayar,
        $data['berat'],
        $data['total_harga'],
        $metode_pembayaran
    );
    
    if (!mysqli_stmt_execute($stmt_insert)) {
        throw new Exception("Gagal menyimpan ke laporan: " . mysqli_stmt_error($stmt_insert));
    }
    mysqli_stmt_close($stmt_insert);
    $query_delete = "DELETE FROM transaksi WHERE id_transaksi = ?";
    $stmt_delete = mysqli_prepare($koneksi, $query_delete);
    mysqli_stmt_bind_param($stmt_delete, 's', $id_transaksi);
    
    if (!mysqli_stmt_execute($stmt_delete)) {
        throw new Exception("Gagal menghapus dari transaksi: " . mysqli_stmt_error($stmt_delete));
    }
    mysqli_stmt_close($stmt_delete);

    mysqli_commit($koneksi);
    header("location:" . BASE_URL . "transaksi-keluar.php?status=sukses_bayar");

} catch (Exception $e) {
    mysqli_rollback($koneksi);
    echo "Terjadi kesalahan: " . $e->getMessage();
}

mysqli_close($koneksi);
?>