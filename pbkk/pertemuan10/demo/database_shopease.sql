-- ==========================================================
-- Database Schema & Seed Data: ShopEase Online Store
-- PBKK Pertemuan 10 (CodeIgniter 4 + MariaDB)
-- ==========================================================

CREATE DATABASE IF NOT EXISTS db_shopease
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE db_shopease;

DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;

-- 1. Tabel Users (Authentication & Role)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer', 'operator') DEFAULT 'customer',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabel Categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(120) UNIQUE,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabel Products (Berelasi ke Categories)
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(12,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    image VARCHAR(255) NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_products_category
        FOREIGN KEY (category_id) REFERENCES categories(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

-- 4. Tabel Orders & Order Items (Struktur Inti Transaksi dari Modul 2)
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_number VARCHAR(50) UNIQUE NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    order_status VARCHAR(30) DEFAULT 'pending_payment',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_orders_user
        FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    product_name VARCHAR(150) NOT NULL,
    price DECIMAL(12,2) NOT NULL,
    quantity INT NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    CONSTRAINT fk_order_items_order
        FOREIGN KEY (order_id) REFERENCES orders(id),
    CONSTRAINT fk_order_items_product
        FOREIGN KEY (product_id) REFERENCES products(id)
);

-- ==========================================================
-- SEED DATA AWAL
-- Akun Demo:
--   Admin    : admin@shopease.test    / admin123
--   Customer : customer@shopease.test / customer123
-- ==========================================================
INSERT INTO users (name, email, password, role) VALUES
('Administrator ShopEase', 'admin@shopease.test', '$2y$12$bntnNTRLIyXDsl99Llx32.5oz3YYDUofrL64juuUkMUU3us6ar5lO', 'admin'),
('Ageng Prayogo', 'customer@shopease.test', '$2y$12$whOfJFyQhM4TxaRyoCvnbuj8WhxgYnoaQCjJQL6UYCHtALVJKbrYG', 'customer');

INSERT INTO categories (name, slug, description) VALUES
('Elektronik', 'elektronik', 'Perangkat audio, gadget, dan aksesori teknologi harian.'),
('Fashion', 'fashion', 'Pakaian, sepatu, dan perlengkapan gaya kasual.'),
('Aksesoris', 'aksesoris', 'Jam tangan, tas, dan pelengkap penampilan.');

INSERT INTO products (category_id, name, description, price, stock, image, status) VALUES
(1, 'Wireless Headphone', 'Headphone Bluetooth dengan noise reduction dan baterai 30 jam.', 299000.00, 20, NULL, 'active'),
(2, 'Sneakers Casual', 'Sepatu sneakers kasual ringan dan nyaman untuk aktivitas harian.', 350000.00, 15, NULL, 'active'),
(3, 'Smart Watch', 'Jam tangan pintar dengan pemantau detak jantung dan notifikasi.', 450000.00, 10, NULL, 'active'),
(1, 'Bluetooth Speaker Mini', 'Speaker portabel suara jernih dengan koneksi Bluetooth 5.3.', 275000.00, 18, NULL, 'active'),
(1, 'Mechanical Keyboard TKL', 'Keyboard mekanikal compact dengan switch tactile dan backlight.', 520000.00, 12, NULL, 'active'),
(2, 'Jaket Windbreaker', 'Jaket ringan tahan angin cocok untuk berkendara dan outdoor.', 285000.00, 14, NULL, 'active'),
(2, 'Kaos Katun Combed 30s', 'Kaos polos premium berbahan katun lembut dan menyerap keringat.', 95000.00, 40, NULL, 'active'),
(3, 'Tas Ransel Laptop 15"', 'Backpack anti air dengan kompartemen laptop hingga 15.6 inci.', 320000.00, 16, NULL, 'active'),
(3, 'Kacamata Anti Radiasi', 'Kacamata lensa blue-light filter untuk kenyamanan di depan layar.', 145000.00, 25, NULL, 'active'),
(1, 'Mouse Wireless Ergonomic', 'Mouse nirkabel senyap dengan DPI yang dapat disesuaikan.', 165000.00, 22, NULL, 'active');
