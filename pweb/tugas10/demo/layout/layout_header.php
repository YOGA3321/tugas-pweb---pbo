<?php
session_start();
include_once __DIR__ . '/../config.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:" . BASE_URL . "login.php?pesan=belum_login");
    exit;
}

$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User';
$role = isset($_SESSION['role']) ? htmlspecialchars($_SESSION['role']) : 'Role';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

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

        @media (max-width: 767.98px) {
            .sidebar {
                /* Sembunyikan sidebar ke kiri layar */
                transform: translateX(-100%);
                /* Posisikan di atas segalanya */
                z-index: 1045; 
                height: 100vh;
            }

            /* Kelas 'active' ini akan kita gunakan di JS */
            .sidebar.active {
                /* Tampilkan sidebar */
                transform: translateX(0);
            }

            .main-content {
                /* Buat konten utama jadi 100% lebar di HP */
                margin-left: 0;
                width: 100%;
            }
            
            .page-content {
                padding: 1rem;
            }
        }

        .sidebar-overlay {
            display: none; /* Sembunyi di desktop */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1040; /* Di bawah sidebar (1045) */
        }
        
        /* Tampilkan overlay saat sidebar aktif */
        .sidebar.active + .sidebar-overlay {
            display: block;
        }

        /* Pastikan topbar (putih) ada di atas konten */
        .topbar {
            z-index: 1030;
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
                <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>index">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'pelanggan.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>pelanggan">
                    <i class="bi bi-people-fill"></i>
                    Pelanggan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'layanan.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>layanan">
                    <i class="bi bi-box-seam-fill"></i>
                    Layanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'transaksi.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>transaksi">
                    <i class="bi bi-hourglass-split"></i>
                    Cucian Aktif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'transaksi-keluar.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>transaksi-keluar">
                    <i class="bi bi-cash-coin"></i>
                    Transaksi Keluar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current_page == 'laporan.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>laporan">
                    <i class="bi bi-file-earmark-bar-graph-fill"></i>
                    Laporan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>logout" onclick="return confirm('Apakah Anda yakin ingin logout?');">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg topbar">
            <div class="container-fluid">
                <button class="btn btn-primary d-md-none" type="button" id="sidebarToggle">
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