<?php
require_once '../config.php';
header('Content-Type: application/json');

$mahasiswa = [];
$sql = "SELECT m.id, m.nama, m.nim, j.nama_jurusan 
        FROM mahasiswa m
        JOIN jurusan j ON m.jurusan_id = j.id
        ORDER BY m.waktu_pendaftaran DESC";
$result = $conn->query($sql);

if ($result) {
    $mahasiswa = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$conn->close();
echo json_encode($mahasiswa);
?>