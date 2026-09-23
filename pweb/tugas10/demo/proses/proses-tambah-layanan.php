<?php
session_start();
include '../config.php'; 

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama_layanan = htmlspecialchars($_POST['nama_layanan']);
    $harga_per_kg = $_POST['harga_per_kg']; // Tipe data DECIMAL/INT

    if (empty($nama_layanan) || empty($harga_per_kg)) {
        die("Semua field wajib diisi.");
    }

    $query = "INSERT INTO layanan (nama_layanan, harga_per_kg) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        // 'sd' = string, decimal/double
        mysqli_stmt_bind_param($stmt, 'sd', $nama_layanan, $harga_per_kg);
        
        if (mysqli_stmt_execute($stmt)) {
            header("location:" . BASE_URL . "layanan.php?status=sukses_tambah");
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