<?php
session_start();
include '../config.php'; 

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_layanan = $_POST['id_layanan'];
    $nama_layanan = htmlspecialchars($_POST['nama_layanan']);
    $harga_per_kg = $_POST['harga_per_kg'];

    if (empty($nama_layanan) || empty($harga_per_kg) || empty($id_layanan)) {
        die("Semua field wajib diisi.");
    }

    $query = "UPDATE layanan SET nama_layanan = ?, harga_per_kg = ? WHERE id_layanan = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sdi', $nama_layanan, $harga_per_kg, $id_layanan);
        
        if (mysqli_stmt_execute($stmt)) {
            header("location:" . BASE_URL . "layanan.php?status=sukses_edit");
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