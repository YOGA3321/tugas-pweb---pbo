<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Tugas PBKK - Ageng Prayogo</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .badge-status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            box-shadow: var(--shadow-raised-sm);
        }
        .notice-card {
            background-color: var(--bg-color);
            padding: 24px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            margin-bottom: 35px;
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .notice-icon {
            font-size: 2.2rem;
            flex-shrink: 0;
        }
        .notice-text h3 {
            margin: 0 0 6px 0;
            color: var(--text-heading);
            font-size: 1.1rem;
        }
        .notice-text p {
            margin: 0;
            font-size: 0.92rem;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Navigasi Kembali ke Portal -->
        <div class="subportal-nav">
            <a href="../" class="tombol-kembali" style="margin-bottom:0;">&larr; Kembali ke Portal Kelas</a>
            <span class="badge-course-type">
                <span class="badge-dot pbkk"></span> Pemrograman Berbasis Kerangka Kerja (PBKK)
            </span>
        </div>

        <header>
            <h1>Portal Tugas PBKK</h1>
            <p>Repositori tugas, implementasi arsitektur framework web modern, pengembangan REST API, dan proyek aplikasi skala enterprise oleh Ageng Prayogo.</p>
        </header>

        <!-- Banner Info Modul Aktif -->
        <div class="notice-card">
            <div class="notice-icon">💡</div>
            <div class="notice-text">
                <h3>Semester Berjalan • Modul Siap Digunakan</h3>
                <p>Direktori ini disiapkan untuk pengumpulan seluruh tugas mata kuliah Pemrograman Berbasis Kerangka Kerja (PBKK). Setiap tugas baru dapat ditambahkan ke dalam folder <code>pbkk/</code> dengan struktur yang seragam.</p>
            </div>
        </div>

        <main class="tugas-grid">
            <div class="tugas-card" style="cursor: default;">
                <span class="badge-status">Siap Diisi</span>
                <div class="card-icon">🚀</div>
                <h2>Tugas Pertemuan 1: Setup Framework & Environment</h2>
                <p>Konfigurasi lingkungan pengembangan framework, virtual host, manajemen dependensi (Composer/NPM), dan struktur direktori MVC.</p>
            </div>

            <a href="pertemuan2/" class="tugas-card">
                <span class="badge-status" style="background: rgba(16, 185, 129, 0.15); color: #059669;">Tersedia</span>
                <div class="card-icon">💻</div>
                <h2>Tugas Pertemuan 2: C# Console App (CRUD Mahasiswa)</h2>
                <p>Implementasi aplikasi sistem data mahasiswa berbasis C# .NET dengan List collection, enkapsulasi OOP, pencarian, dan validasi input.</p>
            </a>

            <div class="tugas-card" style="cursor: default;">
                <span class="badge-status">Mendatang</span>
                <div class="card-icon">🗄️</div>
                <h2>Tugas Pertemuan 3: Database & Eloquent ORM</h2>
                <p>Database Migration, Seeder, Factories, dan manipulasi data relasional memanfaatkan fitur ORM modern.</p>
            </div>

            <div class="tugas-card" style="cursor: default;">
                <span class="badge-status">Mendatang</span>
                <div class="card-icon">⚡</div>
                <h2>Tugas Pertemuan 4: RESTful API & Autentikasi</h2>
                <p>Pengembangan endpoint RESTful API dengan format JSON standar, validasi request, dan proteksi token (Sanctum/JWT).</p>
            </div>

            <div class="tugas-card" style="cursor: default;">
                <span class="badge-status">Mendatang</span>
                <div class="card-icon">🏆</div>
                <h2>Evaluasi Tengah Semester (ETS)</h2>
                <p>Pengembangan proyek aplikasi web interaktif berbasis kerangka kerja modern secara mandiri / tim.</p>
            </div>

            <div class="tugas-card" style="cursor: default;">
                <span class="badge-status">Mendatang</span>
                <div class="card-icon">🎯</div>
                <h2>Evaluasi Akhir Semester (EAS)</h2>
                <p>Aplikasi fullstack terintegrasi dengan sistem keamanan, dashboard manajemen, dan integrasi API eksternal.</p>
            </div>
        </main>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; Pemrograman Berbasis Kerangka Kerja &bull; <a href="../">Kembali ke Portal Kelas</a></p>
        </footer>
    </div>

</body>
</html>
