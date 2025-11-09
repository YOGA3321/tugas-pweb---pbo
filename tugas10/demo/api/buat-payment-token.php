<?php
include '../config.php'; // Ini akan otomatis load vendor dan config Midtrans
header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'ID Transaksi tidak ditemukan']);
    exit;
}

$id_transaksi = $_GET['id'];

// Ambil data transaksi DAN pelanggan
$query = "SELECT t.*, p.nama, p.no_hp 
          FROM transaksi t 
          JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan 
          WHERE t.id_transaksi = ? LIMIT 1";
          
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 's', $id_transaksi);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$transaksi = mysqli_fetch_assoc($result);

if (!$transaksi) {
    echo json_encode(['error' => 'Data transaksi tidak ditemukan']);
    exit;
}

// Persiapkan parameter untuk Midtrans
$params = [
    'transaction_details' => [
        'order_id' => $transaksi['id_transaksi'],
        'gross_amount' => (int)$transaksi['total_harga'],
    ],
    'customer_details' => [
        'first_name' => $transaksi['nama'],
        'phone' => $transaksi['no_hp'],
        // Email wajib untuk beberapa metode bayar, 
        // karena kita tidak punya, kita buat dummy
        'email' => $transaksi['no_hp'] . '@laundrycrafty.com', 
    ],
    'item_details' => [[
        'id' => $transaksi['id_layanan'],
        'price' => (int)$transaksi['total_harga'],
        'quantity' => 1,
        'name' => 'Laundry ' . $transaksi['berat'] . ' Kg'
    ]]
];

try {
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    echo json_encode(['token' => $snapToken]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>