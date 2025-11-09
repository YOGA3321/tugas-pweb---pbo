<?php
session_start();
include '../config.php'; 

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_transaksi = $_POST['id_transaksi'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_layanan = $_POST['id_layanan'];
    $berat = $_POST['berat'];
    
    if (empty($id_transaksi) || empty($id_pelanggan) || empty($id_layanan) || empty($berat) || $berat <= 0) {
        die("Data tidak lengkap atau berat tidak valid.");
    }

    $query_harga = "SELECT harga_per_kg FROM layanan WHERE id_layanan = ? LIMIT 1";
    $stmt_harga = mysqli_prepare($koneksi, $query_harga);
    mysqli_stmt_bind_param($stmt_harga, 'i', $id_layanan);
    mysqli_stmt_execute($stmt_harga);
    $hasil_harga = mysqli_stmt_get_result($stmt_harga);
    
    if (mysqli_num_rows($hasil_harga) == 0) {
        die("Layanan tidak ditemukan.");
    }
    
    $data_layanan = mysqli_fetch_assoc($hasil_harga);
    $harga_per_kg = $data_layanan['harga_per_kg'];
    mysqli_stmt_close($stmt_harga);
    $total_harga = $harga_per_kg * $berat;
    $query = "UPDATE transaksi SET 
                id_pelanggan = ?, 
                id_layanan = ?, 
                berat = ?, 
                total_harga = ? 
            WHERE id_transaksi = ?";
    
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'iidds', $id_pelanggan, $id_layanan, $berat, $total_harga, $id_transaksi);
        
        if (mysqli_stmt_execute($stmt)) {
            header("location:" . BASE_URL . "transaksi.php?status=sukses_edit");
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
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