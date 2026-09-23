<?php
header('Content-Type: application/json');

$valid_email = 'example@example.com';
$valid_password = 'password123';

// Ambil data yang dikirim dari form (metode POST)
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validasi
if ($email === $valid_email && $password === $valid_password) {
    // Jika login berhasil
    $response = [
        'status' => 'success',
        'message' => 'Login Berhasil! Selamat datang.'
    ];
} else {
    // Jika login gagal
    $response = [
        'status' => 'error',
        'message' => 'Email atau Password Salah.'
    ];
}

// Kembalikan respons dalam format JSON
echo json_encode($response);
?>