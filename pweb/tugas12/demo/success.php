<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Berhasil</title>
    <link rel="stylesheet" href="css/style-register.css">
    <style>
        body { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .card { text-align: center; }
        .btn { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="card" style="max-width: 500px;">
        <h2>Pendaftaran Berhasil!</h2>
        <p>Terima kasih telah mendaftar di BIMBINGKU.</p>
        <p>Nomor registrasi Anda adalah: <strong><?php echo htmlspecialchars($_GET['id']); ?></strong></p>
        <p>Data Anda akan segera diverifikasi oleh Admin Cabang.</p>
        <a href="register.html" class="btn primary">Daftar Lagi</a>
    </div>
</body>
</html>