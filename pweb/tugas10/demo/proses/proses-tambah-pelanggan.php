<?php
session_start();
include '../config.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login! Silakan login terlebih dahulu.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_hp = htmlspecialchars($_POST['no_hp']);

    if (empty($nama)) {
        die("Nama tidak boleh kosong.");
    }

    $query_cek = "SELECT id_pelanggan FROM pelanggan WHERE UPPER(nama) = UPPER(?)";
    $stmt_cek = mysqli_prepare($koneksi, $query_cek);
    mysqli_stmt_bind_param($stmt_cek, 's', $nama);
    mysqli_stmt_execute($stmt_cek);
    mysqli_stmt_store_result($stmt_cek);
    
    if (mysqli_stmt_num_rows($stmt_cek) > 0) {
        mysqli_stmt_close($stmt_cek);
        mysqli_close($koneksi);
        header("location:" . BASE_URL . "forms/form-tambah-pelanggan.php?status=gagal_nama_duplikat");
        exit;
    }
    mysqli_stmt_close($stmt_cek);

    $query = "INSERT INTO pelanggan (nama, alamat, no_hp) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $nama, $alamat, $no_hp);
        if (mysqli_stmt_execute($stmt)) {
            header("location:" . BASE_URL . "pelanggan.php?status=sukses_tambah");
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