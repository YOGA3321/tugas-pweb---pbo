<?php 
/*
 * File: proses-login.php
 * Deskripsi: Memproses data login dari form
 */

// 1. Memulai Session
// Session penting untuk menyimpan status login
session_start();

// 2. Menghubungkan ke database
include 'config.php'; // Mengambil koneksi dari file config.php

// 3. Menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password']; // Nanti kita akan ganti ini dengan password_verify

// 4. Mencegah SQL Injection (Dasar)
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// 5. Query untuk mencari user
// (CATATAN: Ini adalah cara SEMENTARA karena kita belum pakai password_hash)
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$data = mysqli_query($koneksi, $query);

// 6. Cek jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    // Jika data ditemukan (login berhasil)
    $hasil = mysqli_fetch_assoc($data);
    
    // 7. Buat session
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $hasil['role'];
    $_SESSION['status'] = "login"; // Ini penanda utama status login
    
    // 8. Alihkan ke halaman dashboard (index.php)
    header("location:index.php");

} else {
    // Jika data tidak ditemukan (login gagal)
    // 9. Alihkan kembali ke halaman login dengan pesan error
    header("location:login.php?pesan=gagal");
}

/*
 * PENTING (Untuk Fase Keamanan):
 * Cara cek password di atas (baris 25) TIDAK AMAN.
 * Nanti, setelah kita perbaiki cara input password, kita akan ganti kodenya menjadi seperti ini:
 * * $query = "SELECT * FROM user WHERE username='$username'";
 * $data = mysqli_query($koneksi, $query);
 * $hasil = mysqli_fetch_assoc($data);
 * * if($hasil && password_verify($password, $hasil['password'])) {
 * // Login berhasil
 * $_SESSION['username'] = $hasil['username'];
 * // ... sisanya sama
 * } else {
 * // Login gagal
 * header("location:login.php?pesan=gagal");
 * }
 */
?>