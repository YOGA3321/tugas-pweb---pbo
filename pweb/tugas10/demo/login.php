<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-M">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LaundryCrafty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f0f2f5; /* Latar belakang abu-abu muda */
        }
        .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .card-header {
            background-color: #0d6efd; /* Biru primer Bootstrap */
            color: white;
            border-bottom: none;
            text-align: center;
            padding: 20px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
    </style>
</head>
<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-5 col-lg-4">
            <div class="card rounded-3">
                <div class="card-header rounded-top">
                    <h4>SELAMAT DATANG</h4>
                    <p class="mb-0">Login ke Akun LaundryCrafty Anda</p>
                </div>
                <div class="card-body p-4">
                    
                    <?php 
                    // Menampilkan pesan error jika ada
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo "<div class='alert alert-danger' role='alert'>Login gagal! Username atau password salah.</div>";
                        } else if($_GET['pesan'] == "logout"){
                            echo "<div class='alert alert-success' role='alert'>Anda telah berhasil logout.</div>";
                        } else if($_GET['pesan'] == "belum_login"){
                            echo "<div class='alert alert-warning' role='alert'>Anda harus login untuk mengakses halaman.</div>";
                        }
                    }
                    ?>

                    <form action="proses/proses-login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required value="admin">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required value="admin">
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>