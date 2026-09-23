<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan EAS - Aplikasi POS Waroeng Modern Bites</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/style.css">



    <style>
        /* Table Styles - Force Black Borders */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; border: 2px solid #000 !important; }
        th, td { border: 1px solid #000 !important; padding: 12px; text-align: left; color: #000; }
        th { background-color: #e0e0e0; color: #000; font-weight: bold; }
        
        /* Text Color Fixes */
        .konten-tugas .meta-info { color: #000 !important; }
        .konten-tugas p, .konten-tugas li { color: #000; }
        
        /* Modal Style */
        .modal { display: none; position: fixed; z-index: 999; padding-top: 50px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.9); transition: opacity 0.3s ease; }
        .modal-content { margin: auto; display: block; width: 80%; max-width: 900px; border-radius: 5px; }
        .modal-close { position: absolute; top: 15px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>

    <div class="container">
        <a href="../" class="tombol-kembali">← Kembali ke Halaman Utama</a>

        <div class="konten-tugas">
            
            <h1>Laporan Proyek EAS: Waroeng Modern Bites</h1>
            
            <div class="meta-info">
                <h2>Anggota Tim:</h2>
                <ul>
                    <li><strong>Ageng Prayogo</strong> (5025241225)</li>
                    <li><strong>Farel Prastita Ramadhan</strong> (5025251219)</li>
                    <li><strong>Safa Maulana Efendi</strong> (5025241227)</li>
                </ul>
                <hr>
                <h2><strong>Judul Proyek:</strong> Aplikasi Point of Sales (POS) & Manajemen Stok Berbasis Web</h2>
                <h2><strong>Mata Kuliah:</strong> Pengembangan Aplikasi Web / PBO</h2>
                <h2><strong>Semester:</strong> Genap 2024/2025</h2>
            </div>

            <div class="tech-stack">
                <span>PHP 8.0+</span>
                <span>MySQL</span>
                <span>Bootstrap 5</span>
                <span>Midtrans API</span>
                <span>Google OAuth</span>
                <span>Server-Sent Events (SSE)</span>
                <span>Composer</span>
            </div>
            <hr>

            <h2>1. Laporan Proyek & Implementasi Teknis</h2>
            <p>
                Proyek ini adalah pengembangan sistem informasi penjualan dan manajemen gudang yang terintegrasi. Sistem dirancang untuk menangani transaksi pelanggan (Dine-in/Takeaway), manajemen stok bahan baku multi-gudang, serta pelaporan keuangan otomatis.
            </p>

            <h3>A. Frontend & Backend Development</h3>
            <ul>
                <li><strong>Backend Architecture:</strong> Aplikasi dibangun menggunakan PHP Native dengan pendekatan prosedural dan modular (pemisahan logika di folder <code>/auth</code>, <code>/admin/api</code>, dll). Manajemen dependensi menggunakan <strong>Composer</strong> (vlucas/phpdotenv, midtrans/midtrans-php).</li>
                <li><strong>Frontend Interface:</strong> Antarmuka pengguna responsif menggunakan <strong>Bootstrap 5</strong>. Halaman dashboard admin dan gudang menggunakan desain modern dengan fitur <em>Sidebar Offcanvas</em>.</li>
                <li><strong>Real-time Features:</strong> Implementasi <strong>Server-Sent Events (SSE)</strong> pada `api/sse_notifications.php` memungkinkan notifikasi pesanan masuk secara <em>real-time</em> ke dapur tanpa perlu refresh halaman.</li>
            </ul>

            <h3>B. Database Implementation</h3>
            <p>Database <code>penjualan2</code> dirancang menggunakan MySQL dengan relasi antar tabel (Foreign Keys) yang ketat untuk menjaga integritas data.</p>
            <ul>
                <li><strong>Manajemen User:</strong> Tabel <code>users</code> menangani Multi-Role (Admin, Karyawan, Gudang, Pelanggan) dan mendukung login via Google (kolom <code>google_id</code>).</li>
                <li><strong>Transaksi & Stok:</strong> Struktur tabel <code>transaksi</code> terhubung dengan <code>transaksi_detail</code> dan <code>meja</code>. Manajemen stok menggunakan tabel <code>gudang_items</code>, <code>barang_masuk</code>, dan <code>request_stok</code> untuk mencatat mutasi barang.</li>
                <li><strong>Installer:</strong> Fitur unik proyek ini adalah adanya folder <code>/install</code> yang berisi wizard instalasi otomatis untuk membuat database dan tabel <code>master.sql</code> jika aplikasi baru pertama kali dijalankan.</li>
            </ul>

            <h3>C. Integrasi API</h3>
            <ol>
                <li><strong>Midtrans Payment Gateway:</strong> Integrasi pembayaran digital (QRIS, E-Wallet) menggunakan Midtrans Snap API. Webhook (`midtrans_webhook.php`) digunakan untuk mengupdate status pembayaran secara otomatis di database.</li>
                <li><strong>Google OAuth 2.0:</strong> Fitur "Masuk dengan Google" diimplementasikan menggunakan library <code>google/apiclient</code>, memudahkan pengguna login tanpa password manual.</li>
                <li><strong>DomPDF:</strong> Digunakan untuk men-generate laporan keuangan dan struk pembelian dalam format PDF.</li>
            </ol>

            <h3>D. Pengujian (Testing)</h3>
            <p>Pengujian dilakukan menggunakan dua metode:</p>
            <ul>
                <li><strong>Unit Testing:</strong> Menggunakan <strong>PHPUnit</strong> (terkonfigurasi di `phpunit.xml`) untuk menguji logika bisnis backend, seperti kalkulasi total transaksi dan validasi stok.</li>
                <li><strong>Black Box Testing:</strong> Pengujian alur manual mulai dari Instalasi Database -> Login Google -> Pemesanan Menu -> Pembayaran Midtrans -> Notifikasi Dapur -> Selesai.</li>
            </ul>

            <hr>

            <h2>2. Diagram Sistem</h2>
            <p>Berikut adalah ilustrasi alur kerja sistem dari sisi Pelanggan hingga Dapur/Admin.</p>
            
            <div class="img-placeholder" onclick="alert('Silakan ganti src gambar diagram di kode.')">
                [ Tempat Gambar Diagram Sistem / Flowchart ]
            </div>
            <p class="caption">Gambar 1. Arsitektur Sistem & Alur Data Transaksi</p>

            <hr>

            <h2>3. User Guide (Panduan Pengguna)</h2>
            
            <h3>Untuk Admin/Karyawan:</h3>
            <ol>
                <li><strong>Login:</strong> Masuk melalui halaman `/login.php`. User pendaftar pertama otomatis menjadi Admin.</li>
                <li><strong>Manajemen Menu:</strong> Akses menu "Manajemen Menu" untuk menambah/edit produk.</li>
                <li><strong>Kasir:</strong> Gunakan menu "Pesanan Masuk" untuk memproses pesanan dari pelanggan atau "Pesanan Manual" untuk input di kasir.</li>
                <li><strong>Laporan:</strong> Akses menu "Laporan" untuk melihat grafik pendapatan dan export PDF.</li>
            </ol>

            <h3>Untuk Gudang:</h3>
            <ol>
                <li><strong>Barang Masuk:</strong> Catat pembelian bahan baku dari supplier di menu "Barang Masuk".</li>
                <li><strong>Request Stok:</strong> Pantau permintaan stok dari cabang di menu "Permintaan Masuk" dan lakukan persetujuan pengiriman.</li>
            </ol>

            <h3>Untuk Pelanggan:</h3>
            <ol>
                <li>Scan QR Code meja atau akses halaman utama.</li>
                <li>Pilih menu, masukkan ke keranjang, dan lakukan Checkout.</li>
                <li>Bayar menggunakan QRIS/E-Wallet via Midtrans.</li>
            </ol>

            <hr>

            <h2>4. Pembagian Jobdesk</h2>
            <p>Proyek ini dikerjakan secara tim dengan pembagian tanggung jawab sebagai berikut:</p>

            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 30%;">Nama Anggota</th>
                        <th style="width: 20%;">Peran</th>
                        <th>Deskripsi Tugas (Job Description)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><strong>Ageng Prayogo (5025241225)</strong></td>
                        <td>Fullstack Developer</td>
                        <td>
                            - Perancangan Database & Installer Otomatis.<br>
                            - Integrasi API Midtrans & Google OAuth.<br>
                            - Pengembangan Modul Gudang & SSE Realtime.<br>
                            - Setup Server & Deployment.
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><strong>Farel Prastita Ramadhan (5025251219)</strong></td>
                        <td>Front End</td>
                        <td>
                            - Slicing desain Dashboard Admin & Halaman Pelanggan.<br>
                            - Implementasi Bootstrap & Responsiveness.<br>
                            - Membuat animasi interaktif UI.
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><strong>Safa Maulana Efendi (5025241227)</strong></td>
                        <td>Testing</td>
                        <td>
                            - Black Box Testing seluruh fitur.<br>
                            - Menyusun Skenario Uji (Test Cases).<br>
                            - Validasi Bug & Error Log.<br>
                            - Dokumentasi User Guide.
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>
            <a href="https://sale.lopyta.com" class="tombol-demo" target="_blank">Buka Aplikasi</a>
            <a href="https://youtu.be/mf6JIFCjqKU" class="tombol-demo" style="background-color: #c0392b;">Video Demo</a>

        </div>
    </div>

    <div id="myModal" class="modal">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
        var modal = document.getElementById('myModal');
        var modalImg = document.getElementById("img01");

        function openModal(element) {
            modal.style.display = "block";
            setTimeout(() => { modal.style.opacity = "1"; }, 10);
            modalImg.src = element.src;
        }

        function closeModal() {
            modal.style.opacity = "0";
            setTimeout(function() {
                modal.style.display = "none";
            }, 300);
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>