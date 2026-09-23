<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BIMBINGKU</title>
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style-dashboard.css">
</head>
<body>
    <div class="app-layout">
        
        <aside class="sidebar">
            <div class="brand">BIMBINGKU</div>
            
            <div class="user-info">
                Selamat datang,
                <strong><?php echo htmlspecialchars($user_name); ?></strong>
                <span>(<?php echo htmlspecialchars($user_role); ?>)</span>
                
                <a href="<?php echo BASE_URL; ?>logout">Logout</a>
            </div>

            <nav class="sidebar-menu">
                <?php 
                switch ($user_role) {
                    case 'Admin Pusat':
                ?>
                        <a href="<?php echo BASE_URL; ?>dashboard">Dashboard</a>
                        <a href="<?php echo BASE_URL; ?>modules/classes/list">Kelola Kelas</a>
                        <a href="<?php echo BASE_URL; ?>modules/users/list">Kelola Pengguna</a>
                        <a href="<?php echo BASE_URL; ?>modules/branches/list">Kelola Cabang</a>
                        <a href="<?php echo BASE_URL; ?>modules/payment/list">Verifikasi Pembayaran</a>
                        <a href="<?php echo BASE_URL; ?>modules/info/list">Info & Pengumuman</a>
                <?php
                        break;
                    
                    case 'Pengajar':
                ?>
                        <a href="<?php echo BASE_URL; ?>dashboard">Dashboard</a>
                        <a href="<?php echo BASE_URL; ?>modules/classes/list">Kelas Saya</a>
                        <a href="<?php echo BASE_URL; ?>modules/attendance/list">Presensi</a>
                        <a href="<?php echo BASE_URL; ?>modules/grades/list">Input Nilai</a>
                        <a href="<?php echo BASE_URL; ?>modules/materials/list">Upload Materi</a>
                <?php
                        break;

                    case 'Siswa':
                ?>
                        <a href="<?php echo BASE_URL; ?>dashboard">Dashboard</a>
                        <a href="<?php echo BASE_URL; ?>modules/classes/list">Kelas Saya</a>
                        <a href="<?php echo BASE_URL; ?>modules/grades/view">Lihat Nilai</a>
                        <a href="<?php echo BASE_URL; ?>modules/materials/list">Materi Belajar</a>
                        <a href="<?php echo BASE_URL; ?>modules/payment/history">Riwayat Pembayaran</a>
                <?php
                        break;
                    
                    default:
                        echo "<p>Peran Anda tidak dikenali.</p>";
                        break;
                }
                ?>
            </nav>
            </aside>
        
        <button class="menu-toggle" id="menu-toggle">
            <span class="icon-open">&#9776;</span> <span class="icon-close">&times;</span> </button>
        <main class="main-content">