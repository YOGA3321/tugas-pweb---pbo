<?php
// date_default_timezone_set('Asia/Jakarta');
// $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
// $host = $_SERVER['HTTP_HOST'];
// $config_path = __DIR__;
// $doc_root = $_SERVER['DOCUMENT_ROOT'];
// $config_path = str_replace('\\', '/', $config_path);
// $doc_root = str_replace('\\', '/', $doc_root);
// $web_path = str_replace($doc_root, '', $config_path);
// $base_url_path = rtrim($web_path, '/') . '/';
// define('BASE_URL', $protocol . $host . $base_url_path);

// $db_host = 'localhost';
// $db_user = 'root';
// $db_pass = '';
// $db_name = 'laundrycrafty';

// $koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// if (!$koneksi) {
//     die("Koneksi ke database gagal: " . mysqli_connect_error());
// }
// require_once __DIR__ . '/vendor/autoload.php';
// \Midtrans\Config::$serverKey = 'SB-Mid-server-p0J5Kw0tX_JHY_HoYJOQzYXQ'; // Ganti!
// \Midtrans\Config::$isProduction = false; // Set true jika sudah production
// \Midtrans\Config::$isSanitized = true;
// \Midtrans\Config::$is3ds = true;
// \Midtrans\Config::$clientKey = 'SB-Mid-client-m2n6kBqd8rsKrRST'; // Ganti!
?>

// jika di hosting, sesuaikan konfigurasi database dan path sesuai kebutuhan
<?php
date_default_timezone_set('Asia/Jakarta');
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$config_path = __DIR__;
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$config_path = str_replace('\\', '/', $config_path);
$doc_root = str_replace('\\', '/', $doc_root);
$web_path = str_replace($doc_root, '', $config_path);
$base_url_path = rtrim($web_path, '/') . '/';
define('BASE_URL', $protocol . $host . $base_url_path);

$db_host = 'localhost';
$db_user = 'u116133173_laundrycrafty';
$db_pass = '@Yogabd081761';
$db_name = 'u116133173_laundrycrafty';
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
require_once __DIR__ . '/vendor/autoload.php';

\Midtrans\Config::$serverKey = 'SB-Mid-server-p0J5Kw0tX_JHY_HoYJOQzYXQ'; // Ganti!
\Midtrans\Config::$isProduction = false; // Set true jika sudah production
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;
\Midtrans\Config::$clientKey = 'SB-Mid-client-m2n6kBqd8rsKrRST'; // Ganti!
?>