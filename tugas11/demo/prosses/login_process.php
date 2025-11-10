<?php
include '../config.php'; 
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    die("Email dan password wajib diisi.");
}

$stmt = $koneksi->prepare("SELECT user_id, name, password, role_id FROM users WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        
        $role_stmt = $koneksi->prepare("SELECT role_name FROM roles WHERE role_id = ?");
        $role_stmt->bind_param("i", $user['role_id']);
        $role_stmt->execute();
        $role_result = $role_stmt->get_result();
        $role_data = $role_result->fetch_assoc();
        $role_name = $role_data ? $role_data['role_name'] : 'unknown';
        $role_stmt->close();

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $role_name; 

        header("Location: " . BASE_URL . "dashboard.php");
        exit;
    } else {
        echo "<script>alert('Email atau password salah!'); window.location='" . BASE_URL . "login.php';</script>";
    }
} else {
    echo "<script>alert('Email atau password salah!'); window.location='" . BASE_URL . "login.php';</script>";
}

$stmt->close();
$koneksi->close(); 
?>