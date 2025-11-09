<?php
// 1. Selalu mulai dengan session check dan koneksi
session_start();
include 'config.php'; // Atau 'Dikoneksi.php' (sesuaikan)

// 2. Cek status login
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    die("Anda belum login! Silakan login terlebih dahulu.");
}

// 3. Pastikan request adalah POST (dari form edit)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // 4. Ambil data dari form (termasuk ID)
    $id = $_POST['id_pelanggan'];
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_hp = htmlspecialchars($_POST['no_hp']);

    // 5. Validasi sederhana
    if (empty($nama) || empty($id)) {
        die("Nama atau ID tidak boleh kosong.");
    }

    // 6. Buat query UPDATE
    $query = "UPDATE pelanggan SET nama = ?, alamat = ?, no_hp = ? WHERE id_pelanggan = ?";
    
    // 7. Gunakan Prepared Statements
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        // 'sssi' berarti string, string, string, integer
        mysqli_stmt_bind_param($stmt, 'sssi', $nama, $alamat, $no_hp, $id);
        
        // 8. Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil, alihkan kembali ke pelanggan.php dengan pesan sukses
            header("location:pelanggan.php?status=sukses_edit");
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