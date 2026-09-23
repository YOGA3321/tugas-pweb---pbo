<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Tugas Kuliah - Ageng Prayogo</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css?v=<?= time() ?>">
</head>
<body>

    <div class="container">
        <!-- Hero Section -->
        <header class="hero-portal">
            <div class="hero-info">
                <span class="hero-tag">🎓 Repositori Tugas Akademik</span>
                <h1>Portal Tugas Kuliah</h1>
                <p>Selamat datang di repositori terpusat dokumentasi tugas, laporan proyek praktikum, dan implementasi demo interaktif mata kuliah Teknik Informatika.</p>
                
                <div class="student-card-mini">
                    <img src="img/avatar.jpg" alt="Foto Ageng Prayogo" class="student-avatar" width="54" height="54" style="width: 54px; height: 54px; max-width: 54px; max-height: 54px; object-fit: cover; border-radius: 50%; flex-shrink: 0;" onerror="this.src='img/fotoku.jpg'; this.onerror=function(){this.style.display='none'; this.nextElementSibling.style.display='flex';};">
                    <div class="student-avatar-placeholder" style="display:none;">AP</div>
                    <div class="student-text">
                        <h3>Ageng Prayogo</h3>
                        <span>NRP: 5025241225 • Teknik Informatika ITS</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Statistik Ringkas -->
        <section class="portal-stats">
            <div class="stat-box">
                <div class="stat-number">3</div>
                <div class="stat-label">Mata Kuliah</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">25+</div>
                <div class="stat-label">Total Tugas & Proyek</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">100%</div>
                <div class="stat-label">Dokumentasi & Demo</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">Aktif</div>
                <div class="stat-label">Status Semester</div>
            </div>
        </section>

        <!-- Pemilihan Mata Kuliah -->
        <div class="section-title">
            <span>Pilih Mata Kuliah</span>
        </div>

        <main class="course-grid">
            <!-- Kartu 1: Pemrograman Web (PWeb) -->
            <a href="pweb/" class="course-card pweb">
                <div>
                    <div class="course-card-top">
                        <div class="course-icon-badge">🌐</div>
                        <span class="course-pill pweb">PWeb</span>
                    </div>
                    <h2>Pemrograman Web</h2>
                    <span class="course-code">Praktikum Pemrograman Web</span>
                    <p>Kumpulan tugas mingguan, proyek formulir interaktif, implementasi AJAX asynchronous, backend PHP, database MySQL, serta laporan ETS & EAS.</p>
                    
                    <div class="course-tech-stack">
                        <span class="tech-chip">HTML5</span>
                        <span class="tech-chip">CSS3</span>
                        <span class="tech-chip">JavaScript</span>
                        <span class="tech-chip">PHP</span>
                        <span class="tech-chip">MySQL</span>
                        <span class="tech-chip">AJAX</span>
                    </div>
                </div>

                <div class="course-card-footer">
                    <span class="task-count">📚 14 Tugas & Proyek</span>
                    <span class="btn-open-course pweb">Masuk ke Kelas &rarr;</span>
                </div>
            </a>

            <!-- Kartu 2: Pemrograman Berorientasi Objek (PBO) -->
            <a href="pbo/" class="course-card pbo">
                <div>
                    <div class="course-card-top">
                        <div class="course-icon-badge">☕</div>
                        <span class="course-pill pbo">PBO</span>
                    </div>
                    <h2>Pemrograman Berorientasi Objek</h2>
                    <span class="course-code">Praktikum Pemrograman Berorientasi Objek</span>
                    <p>Implementasi prinsip Object-Oriented Programming (OOP) dengan Java, BlueJ modeling, Overloading, Inheritance, Polymorphism, Unit Testing JUnit 4, dan GUI Swing.</p>
                    
                    <div class="course-tech-stack">
                        <span class="tech-chip">Java</span>
                        <span class="tech-chip">OOP</span>
                        <span class="tech-chip">BlueJ</span>
                        <span class="tech-chip">JUnit 4</span>
                        <span class="tech-chip">Java Swing</span>
                        <span class="tech-chip">TDD</span>
                    </div>
                </div>

                <div class="course-card-footer">
                    <span class="task-count">📚 12 Tugas & Proyek</span>
                    <span class="btn-open-course pbo">Masuk ke Kelas &rarr;</span>
                </div>
            </a>

            <!-- Kartu 3: Pemrograman Berbasis Kerangka Kerja (PBKK) -->
            <a href="pbkk/" class="course-card pbkk">
                <div>
                    <div class="course-card-top">
                        <div class="course-icon-badge">🚀</div>
                        <span class="course-pill pbkk">PBKK</span>
                    </div>
                    <h2>Pemrograman Berbasis Kerangka Kerja</h2>
                    <span class="course-code">Praktikum Pemrograman Berbasis Kerangka Kerja</span>
                    <p>Eksplorasi dan pengembangan aplikasi modern menggunakan framework berbasis arsitektur MVC, RESTful API, komponen reaktif, dan integrasi backend terkini.</p>
                    
                    <div class="course-tech-stack">
                        <span class="tech-chip">Framework MVC</span>
                        <span class="tech-chip">RESTful API</span>
                        <span class="tech-chip">Fullstack</span>
                        <span class="tech-chip">Modern Stack</span>
                    </div>
                </div>

                <div class="course-card-footer">
                    <span class="task-count">⚡ Modul Aktif</span>
                    <span class="btn-open-course pbkk">Masuk ke Kelas &rarr;</span>
                </div>
            </a>
        </main>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; Teknik Informatika &bull; Repositori Tugas Kuliah</p>
        </footer>
    </div>

</body>
</html>
