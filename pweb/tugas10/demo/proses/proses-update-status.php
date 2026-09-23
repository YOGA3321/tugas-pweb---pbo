<?php
session_start();
include '../config.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login!");
}

if(isset($_GET['id']) && isset($_GET['status'])){
    
    $id_transaksi = $_GET['id'];
    $status_baru = $_GET['status'];
    $tanggal_selesai = NULL;

    if($status_baru == 'Selesai'){
        $tanggal_selesai = date('Y-m-d H:i:s');
        $query = "UPDATE transaksi SET status = ?, tanggal_selesai = ? WHERE id_transaksi = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'sss', $status_baru, $tanggal_selesai, $id_transaksi);

    } else if ($status_baru == 'Sudah Diambil') {
        $query = "UPDATE transaksi SET status = ? WHERE id_transaksi = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $status_baru, $id_transaksi);

    } else {
        die("Status tidak valid.");
    }

    if ($stmt) {
        if (mysqli_stmt_execute($stmt)) {
            header("location:" . BASE_URL . "transaksi.php?status=sukses_update");
        } else {
            echo "Error: ". mysqli_stmt_error($stmt);
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