<?php
session_start();
include '../config.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login!");
}

if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    
    $query = "DELETE FROM layanan WHERE id_layanan = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        
        if (mysqli_stmt_execute($stmt)) {
            header("location:" . BASE_URL . "layanan.php?status=sukses_hapus");
        } else {
            echo "Error: Tidak bisa menghapus layanan. " . mysqli_stmt_error($stmt);
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