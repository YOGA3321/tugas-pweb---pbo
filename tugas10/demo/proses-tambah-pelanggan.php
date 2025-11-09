<?php
// 1. Selalu mulai dengan session check dan koneksi
session_start();
include 'config.php'; // Atau 'Dikoneksi.php' (sesuaikan)

// 2. Cek status login
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login! Silakan login terlebih dahulu.");
}

// 3. Pastikan request adalah POST (dari form)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // 4. Ambil data dari form
    // Gunakan htmlspecialchars untuk keamanan dasar
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_hp = htmlspecialchars($_POST['no_hp']);

    // 5. Validasi sederhana (pastikan nama tidak kosong)
    if (empty($nama)) {
        die("Nama tidak boleh kosong.");
    }

    // 6. Buat query INSERT
    $query = "INSERT INTO pelanggan (nama, alamat, no_hp) VALUES (?, ?, ?)";
    
    // 7. Gunakan Prepared Statements (LEBIH AMAN dari SQL Injection)
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        // 'sss' berarti ketiga parameter adalah string
        mysqli_stmt_bind_param($stmt, 'sss', $nama, $alamat, $no_hp);
        
        // 8. Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil, alihkan kembali ke pelanggan.php dengan pesan sukses
            header("location:pelanggan.php?status=sukses_tambah");
        } else {
            // Jika gagal
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        
        // 9. Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    // 10. Tutup koneksi
    mysqli_close($koneksi);

} else {
    // Jika diakses langsung tanpa POST
    die("Akses dilarang!");
}
?>