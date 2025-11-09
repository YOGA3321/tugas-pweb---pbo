<?php
date_default_timezone_set('Asia/Jakarta');
define('BASE_URL', '/tugas/tugas10/demo/');
$db_host = 'localhost';
$db_user = 'u116133173_laundrycrafty';
$db_pass = '@Yogabd081761';
$db_name = 'u116133173_laundrycrafty';

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

require_once __DIR__ . '/vendor/autoload.php';

// Konfigurasi Midtrans (Ganti dengan kunci Anda)
\Midtrans\Config::$serverKey = 'SB-Mid-server-p0J5Kw0tX_JHY_HoYJOQzYXQ'; // Ganti!
\Midtrans\Config::$isProduction = false; // Set true jika sudah production
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;
\Midtrans\Config::$clientKey = 'SB-Mid-client-m2n6kBqd8rsKrRST'; // Ganti!
?>