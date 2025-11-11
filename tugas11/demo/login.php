<?php 
// Jika sudah login, langsung lempar ke dashboard
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
include('config.php'); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - BIMBINGKU</title>
    <link rel="stylesheet" href="css/style-register.css">
    <style>
        body { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .login-box {
            width: 360px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="card login-box">
        <h2>Login Sistem</h2>
        <p style="color: #6c757d; text-align: center; margin-top: -15px; margin-bottom: 20px;">Selamat datang kembali!</p>
        
        <form action="prosses/login_process.php" method="POST">
            <div class="row">
                <div class="col-full">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="user@example.com" value="admin@bimbingku.com">
                </div>
            </div>
            <div class="row">
                <div class="col-full">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Password" value="admin">
                </div>
            </div>
            
            <div class="form-actions" style="margin-top: 15px;">
                <button type="submit" class="btn primary" style="width: 100%;">Masuk</button>
            </div>
             <div style="text-align: center; margin-top: 15px;">
                <a href="register.html">Belum punya akun? Daftar</a>
            </div>
        </form>
    </div>
</body>
</html>