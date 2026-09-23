<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Tugas Pemrograman Web - Ageng Prayogo</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/style.css?v=<?= time() ?>">
</head>
<body>

    <div class="container">
        <!-- Navigasi Kembali ke Portal -->
        <div class="subportal-nav">
            <a href="../" class="tombol-kembali" style="margin-bottom:0;">&larr; Kembali ke Portal Kelas</a>
            <span class="badge-course-type">
                <span class="badge-dot pweb"></span> Pemrograman Web (PWeb)
            </span>
        </div>

        <header>
            <h1>Portal Tugas Pemrograman Web</h1>
            <p>Kumpulan tugas mingguan, proyek praktikum, evaluasi tengah semester (ETS), dan evaluasi akhir semester (EAS) Pemrograman Web oleh Ageng Prayogo.</p>
        </header>

        <main class="tugas-grid">
            <a href="tugas1/" class="tugas-card">
                <div class="card-icon">⌨️</div>
                <h2>Tugas Pertemuan 1: Belajar Typewriting</h2>
                <p>Uji kemampuan dan tes kecepatan mengetik (typewriting).</p>
            </a>

            <a href="tugas2/" class="tugas-card">
                <div class="card-icon">👤</div>
                <h2>Tugas Pertemuan 2: Profil Lengkap</h2>
                <p>Membuat halaman profil diri statis yang memuat semua elemen HTML dasar dan semantic markup.</p>
            </a>

            <a href="tugas3/" class="tugas-card">
                <div class="card-icon">📋</div>
                <h2>Tugas Pertemuan 3: Form dan Frame</h2>
                <p>Membuat formulir input data interaktif dan implementasi struktur layout frame.</p>
            </a>

            <a href="tugass3/" class="tugas-card">
                <div class="card-icon">📑</div>
                <h2>Tugas Week 3: Sistem Restoran (Kelompok)</h2>
                <p>Dokumentasi analisis konsep, perancangan fitur, dan modul website sistem manajemen restoran.</p>
            </a>

            <a href="tugas4/" class="tugas-card">
                <div class="card-icon">🎨</div>
                <h2>Tugas Pertemuan 4: HTML dan CSS</h2>
                <p>Implementasi CSS styling modern, layouting responsif, dan keterkaitan file eksternal stylesheet.</p>
            </a>

            <a href="tugas5/" class="tugas-card">
                <div class="card-icon">✨</div>
                <h2>Tugas Pertemuan 5: JavaScript Interaktif</h2>
                <p>Implementasi autocomplete dinamis, konsumsi REST API publik, dan dynamic dropdown cascade.</p>
            </a>

            <a href="tugas6/" class="tugas-card">
                <div class="card-icon">🔐</div>
                <h2>Tugas Pertemuan 6: Form Login Interaktif</h2>
                <p>Pembuatan antarmuka form login modern dengan validasi input berbasis JavaScript DOM.</p>
            </a>

            <a href="tugas7/" class="tugas-card">
                <div class="card-icon">🔑</div>
                <h2>Tugas Pertemuan 7: Form Login AJAX</h2>
                <p>Membuat form login interaktif dengan validasi asynchronous tanpa reload halaman menggunakan AJAX dan PHP.</p>
            </a>

            <a href="ets/" class="tugas-card">
                <div class="card-icon">✈️</div>
                <h2>Ujian Tengah Semester: Landing Page Travel</h2>
                <p>Membuat landing page jasa travel "Traveleka" yang modern, responsif, dinamis, dan kaya interaktivitas.</p>
            </a>

            <a href="tugas8/" class="tugas-card">
                <div class="card-icon">📇</div>
                <h2>Tugas Pertemuan 9: Pendaftaran Mahasiswa</h2>
                <p>Aplikasi CRUD (Create, Read) dengan PHP, MySQL, dan AJAX untuk pendaftaran mahasiswa baru secara dinamis.</p>
            </a>

            <a href="tugas9/" class="tugas-card">
                <div class="card-icon">🍽️</div>
                <h2>Tugas Pertemuan 10: Laporan Project Restoran</h2>
                <p>Dokumentasi dan laporan implementasi aplikasi web Restoran "Sederhana" yang modern dan interaktif.</p>
            </a>

            <a href="tugas10/" class="tugas-card">
                <div class="card-icon">🧺</div>
                <h2>Tugas Pertemuan 11: Project CRUD Laundry</h2>
                <p>Aplikasi CRUD lengkap (Autentikasi, Pelanggan, Transaksi) dengan PHP, MySQL, SweetAlert, dan layout Sidebar.</p>
            </a>

            <a href="tugas11/" class="tugas-card">
                <div class="card-icon">📸</div>
                <h2>Tugas Pertemuan 12: Backend Upload Foto (BIMBINGKU)</h2>
                <p>Implementasi backend secure file upload (foto profil siswa) menggunakan PHP studi kasus BIMBINGKU.</p>
            </a>

            <a href="tugas12/" class="tugas-card">
                <div class="card-icon">📁</div>
                <h2>Tugas Pertemuan 13: Modul Pendaftaran Siswa</h2>
                <p>Pengembangan modul pendaftaran siswa kursus dengan validasi file dan pengelolaan database lengkap.</p>
            </a>

            <a href="eas/" class="tugas-card">
                <div class="card-icon">🏆</div>
                <h2>Evaluasi Akhir Semester (EAS): POS Waroeng Modern Bites</h2>
                <p>Laporan komprehensif dan aplikasi Point of Sales (POS) restoran modern dengan PHP dan MySQL.</p>
            </a>
        </main>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; Pemrograman Web &bull; <a href="../">Kembali ke Portal Kelas</a></p>
        </footer>
    </div>

</body>
</html>