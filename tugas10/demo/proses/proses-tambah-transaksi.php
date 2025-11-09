<?php
session_start();
include '../config.php';
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_layanan = $_POST['id_layanan'];
    $berat = $_POST['berat'];
    $status = 'Proses';
    $tanggal_masuk = date('Y-m-d H:i:s');

    if (empty($id_pelanggan) || empty($id_layanan) || empty($berat) || $berat <= 0) {
        die("Data tidak lengkap atau berat tidak valid.");
    }

    $query_harga = "SELECT harga_per_kg FROM layanan WHERE id_layanan = ? LIMIT 1";
    $stmt_harga = mysqli_prepare($koneksi, $query_harga);
    mysqli_stmt_bind_param($stmt_harga, 'i', $id_layanan);
    mysqli_stmt_execute($stmt_harga);
    $hasil_harga = mysqli_stmt_get_result($stmt_harga);
    
    if (mysqli_num_rows($hasil_harga) == 0) { die("Layanan tidak ditemukan."); }
    
    $data_layanan = mysqli_fetch_assoc($hasil_harga);
    $harga_per_kg = $data_layanan['harga_per_kg'];
    mysqli_stmt_close($stmt_harga);
    $total_harga = $harga_per_kg * $berat;
    $tanggal_id = date('Ymd');
    $id_transaksi_baru = "";
    $is_unique = false;

    do {
        $angka_random = rand(100, 999);
        $id_transaksi_baru = $tanggal_id . $angka_random;
        $query_cek_id = "SELECT id_transaksi FROM transaksi WHERE id_transaksi = ?";
        $stmt_cek = mysqli_prepare($koneksi, $query_cek_id);
        mysqli_stmt_bind_param($stmt_cek, 's', $id_transaksi_baru);
        mysqli_stmt_execute($stmt_cek);
        mysqli_stmt_store_result($stmt_cek);
        
        if (mysqli_stmt_num_rows($stmt_cek) == 0) {
            $is_unique = true;
        }
        mysqli_stmt_close($stmt_cek);

    } while (!$is_unique);
    $query = "INSERT INTO transaksi (id_transaksi, id_pelanggan, id_layanan, tanggal_masuk, berat, total_harga, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'siisdds', $id_transaksi_baru, $id_pelanggan, $id_layanan, $tanggal_masuk, $berat, $total_harga, $status);
        
        if (mysqli_stmt_execute($stmt)) {
            header("location:" . BASE_URL . "transaksi.php?status=sukses_tambah");
        } else {
            echo "Error: Gagal menyimpan transaksi. " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
} else {
    die("Akses dilarang!");
}
?>