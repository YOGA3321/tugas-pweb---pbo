<?php
// define('DB_HOST', 'localhost');
// define('DB_USER', 'pendaftaran_tugas');
// define('DB_PASS', '');
// define('DB_NAME', 'pendaftaran_tugas');

define('DB_HOST', 'localhost');
define('DB_USER', 'u116133173_daftar_tugas');
define('DB_PASS', '@Yogabd46');
define('DB_NAME', 'u116133173_daftar_tugas');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

?>
