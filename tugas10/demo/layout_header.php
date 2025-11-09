<?php
// File ini akan di-include di setiap halaman
session_start();
include_once 'config.php'; // Atau 'Dikoneksi.php' (sesuaikan)

// Cek status login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    // Jika belum login, alihkan ke login.php
    // Kita cek 'role' agar bisa bedakan file login admin/pelanggan nanti
    // Untuk sekarang, kita asumsikan semua adalah admin/kasir
    header("location:login.php?pesan=belum_login");
    exit;
}

// Ambil username dari session
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User';
$role = isset($_SESSION['role']) ? htmlspecialchars($_SESSION['role']) : 'Role';

// Menentukan halaman aktif (untuk highlight sidebar)
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LaundryCrafty</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa; /* Latar belakang halaman */
        }
        
        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background-color: #212529; /* Warna dark */
            color: white;
            padding-top: 20px;
            position: fixed; /* Sidebar tetap di tempat */
            top: 0;
            left: 0;
            transition: all 0.3s;
        }
        
        .sidebar-header {
            padding: 0 1.5rem;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .sidebar-header .fs-4 {
            font-weight: bold;
            color: #0d6efd; /* Biru Primer */
        }
        
        .sidebar .nav-link {
            color: #adb5bd; /* Warna teks abu-abu */
            padding: 12px 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .sidebar .nav-link i {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar .nav-link:hover {
            background-color: #343a40;
            color: white;
        }
        
        .sidebar .nav-link.active {
            background-color: #0d6efd; /* Warna aktif */
            color: white;
            font-weight: 500;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px; /* Sesuaikan dengan lebar sidebar */
            padding: 0;
            width: calc(100% - 260px);
            flex-grow: 1;
        }

        /* Topbar (Navbar di atas konten) */
        .topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 0.5rem 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        /* Halaman Konten (di dalam .main-content) */
        .page-content {
            padding: 2rem;
        }

    </style>
</head>
<body>

    <nav class="sidebar">
        <div class="sidebar-header">
            <a class="navbar-brand" href="index.php">
                <span class="fs-4">LaundryCrafty</span>
            </a>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'pelanggan.php') ? 'active' : ''; ?>" href="pelanggan.php">
                    <i class="bi bi-people-fill"></i>
                    Pelanggan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'layanan.php') ? 'active' : ''; ?>" href="layanan.php">
                    <i class="bi bi-box-seam-fill"></i>
                    Layanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'transaksi.php') ? 'active' : ''; ?>" href="transaksi.php">
                    <i class="bi bi-cash-stack"></i>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?');">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg topbar">
            <div class="container-fluid">
                <button class="btn btn-primary d-md-none" type="button">
                    <i class="bi bi-list"></i>
                </button>
                
                <div class="ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>
                            Selamat datang, <b><?php echo $username; ?></b> (<?php echo $role; ?>)
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="page-content">