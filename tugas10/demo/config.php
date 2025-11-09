<?php
date_default_timezone_set('Asia/Jakarta');
define('BASE_URL', '/tugas10/demo/');
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'laundrycrafty';

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

require_once __DIR__ . '/vendor/autoload.php';

// Konfigurasi Midtrans (Ganti dengan kunci Anda)
\Midtrans\Config::$serverKey = 'SB-Mid-server-xxxxxxxxxxxxxxx'; // Ganti!
\Midtrans\Config::$isProduction = false; // Set true jika sudah production
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;
\Midtrans\Config::$clientKey = 'SB-Mid-client-xxxxxxxxxxxxxxx'; // Ganti!
?>