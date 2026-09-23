<?php
require_once '../config.php';
header('Content-Type: application/json');

$jurusan = [];
$sql = "SELECT id, nama_jurusan FROM jurusan ORDER BY nama_jurusan ASC";
$result = $conn->query($sql);

if ($result) {
    $jurusan = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
}
$conn->close();
echo json_encode($jurusan);
?>
