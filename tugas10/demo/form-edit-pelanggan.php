<?php 
// 1. Selalu mulai dengan session check
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}

// 2. Hubungkan ke database
include 'config.php'; // Atau 'Dikoneksi.php' (sesuaikan)

// 3. Cek apakah ada 'id' di URL
if(!isset($_GET['id'])){
    // Jika tidak ada id, kembalikan ke halaman pelanggan
    header('location: pelanggan.php');
    exit;
}

// 4. Ambil 'id' dari URL
$id = $_GET['id'];

// 5. Query untuk mengambil data pelanggan spesifik
$query = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 'i', $id); // 'i' berarti id adalah integer
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);

// 6. Cek apakah data ditemukan
$data = mysqli_fetch_assoc($hasil);
if(!$data){
    // Jika data tidak ditemukan
    echo "Data tidak ditemukan!";
    exit;
}

// 7. Tutup statement (kita akan buka koneksi baru di proses edit)
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan - LaundryCrafty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">LaundryCrafty</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pelanggan.php">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?');">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Form Edit Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <form action="proses-edit-pelanggan.php" method="POST">
                            
                            <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>">
                            
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($data['alamat']); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. Handphone</label>
                                <input type="tel" class="form-control" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($data['no_hp']); ?>">
                            </div>
                            
                            <hr>
                            
                            <div class="text-end">
                                <a href="pelanggan.php" class="btn btn-secondary me-2">
                                    <i class="bi bi-x-circle"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save-fill"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>