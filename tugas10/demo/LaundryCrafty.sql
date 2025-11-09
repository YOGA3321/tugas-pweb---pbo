-- 1. Membuat database baru
CREATE DATABASE laundry_crafty;

-- 2. Menggunakan database tersebut
USE laundry_crafty;

-- 3. Membuat Tabel Pelanggan (sesuai spesifikasi)
CREATE TABLE pelanggan (
    id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    no_hp VARCHAR(15)
) ENGINE=InnoDB;

-- 4. Membuat Tabel Layanan (sesuai spesifikasi)
CREATE TABLE layanan (
    id_layanan INT AUTO_INCREMENT PRIMARY KEY,
    nama_layanan VARCHAR(100) NOT NULL,
    harga_per_kg DECIMAL(10, 2) NOT NULL
) ENGINE=InnoDB;

-- 6. Membuat Tabel Transaksi (sesuai spesifikasi)
CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT,
    id_layanan INT,
    tanggal_masuk DATETIME NOT NULL,
    tanggal_selesai DATETIME,
    berat DECIMAL(5, 2),
    total_harga DECIMAL(10, 2),
    -- Menggunakan ENUM untuk status cucian
    status ENUM('Proses', 'Selesai', 'Sudah Diambil') NOT NULL DEFAULT 'Proses',
    
    -- Menghubungkan tabel (Foreign Keys)
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan),
    FOREIGN KEY (id_layanan) REFERENCES layanan(id_layanan)
) ENGINE=InnoDB;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    NoTlp VARCHAR(15),
    level INT DEFAULT 5,
    oauth_id VARCHAR(255),
    picture VARCHAR(255),
    last_login DATETIME,
    
    -- Kita tambahkan juga kolom 'role' dari desain awal kita,
    -- karena 'role' (Admin/Kasir) lebih jelas daripada 'level' (5)
    role ENUM('Admin', 'Kasir/Operator') DEFAULT 'Kasir/Operator'
) ENGINE=InnoDB;

-- Masukkan admin baru dengan password yang di-hash ('admin123')
INSERT INTO user 
    (nama, username, email, password, level, role) 
VALUES 
    ('Admin Utama', 'admin', 'admin@laundry.com', '<?php echo password_hash('admin123', PASSWORD_DEFAULT); ?>', 1, 'Admin');