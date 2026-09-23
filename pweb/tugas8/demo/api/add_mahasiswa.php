<?php
require_once '../config.php';
header('Content-Type: application/json');
$response = ['success' => false, 'message' => 'Invalid request.'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nama'], $_POST['nim'], $_POST['email'], $_POST['jurusan_id']) && 
        !empty(trim($_POST['nama'])) && 
        !empty(trim($_POST['nim'])) && 
        !empty(trim($_POST['email'])) && 
        !empty($_POST['jurusan_id'])) 
    {
        $nama = trim($_POST['nama']);
        $nim = trim($_POST['nim']);
        $email = trim($_POST['email']);
        $jurusan_id = (int)$_POST['jurusan_id'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['message'] = 'Format email tidak valid.';
        } else {
            $stmt_check = $conn->prepare("SELECT id FROM mahasiswa WHERE nim = ?");
            $stmt_check->bind_param("s", $nim);
            $stmt_check->execute();
            $stmt_check->store_result();

            if ($stmt_check->num_rows > 0) {
                $response['message'] = 'NIM sudah terdaftar.';
            } else {
                $stmt_insert = $conn->prepare("INSERT INTO mahasiswa (nama, nim, email, jurusan_id) VALUES (?, ?, ?, ?)");
                $stmt_insert->bind_param("sssi", $nama, $nim, $email, $jurusan_id);

                if ($stmt_insert->execute()) {
                    $response['success'] = true;
                    $response['message'] = 'Pendaftaran berhasil!';
                } else {
                    $response['message'] = 'Gagal menyimpan data ke database. Error: ' . $stmt_insert->error;
                }
                $stmt_insert->close();
            }
            $stmt_check->close();
        }
    } else {
        $response['message'] = 'Semua field wajib diisi.';
    }
}

$conn->close();
echo json_encode($response);
?>
