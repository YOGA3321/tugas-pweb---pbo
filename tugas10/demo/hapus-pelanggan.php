<?php
// 1. Selalu mulai dengan session check dan koneksi
session_start();
include 'config.php'; // Atau 'Dikoneksi.php' (sesuaikan)

// 2. Cek status login
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login! Silakan login terlebih dahulu.");
}

// 3. Cek apakah ada 'id' di URL
if(isset($_GET['id'])){
    
    // 4. Ambil 'id' dari URL
    $id = $_GET['id'];
    
    // 5. Buat query DELETE
    $query = "DELETE FROM pelanggan WHERE id_pelanggan = ?";
    
    // 6. Gunakan Prepared Statements
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        // 'i' berarti id adalah integer
        mysqli_stmt_bind_param($stmt, 'i', $id);
        
        // 7. Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil, alihkan kembali ke pelanggan.php dengan pesan sukses
            header("location:pelanggan.php?status=sukses_hapus");
        } else {
            // Jika gagal
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        
        // 8. Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    
    // 9. Tutup koneksi
    mysqli_close($koneksi);

} else {
    // Jika diakses tanpa id
    die("Akses dilarang!");
}
?>