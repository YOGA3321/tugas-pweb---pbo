<?php
// Handler untuk force download PDF jika diakses dengan parameter ?download=pdf
$pdfFile = 'PRD_SkillForge_ETS_PBKK.pdf';
$pdfPath = __DIR__ . '/' . $pdfFile;

if (isset($_GET['download']) && $_GET['download'] === 'pdf') {
    if (file_exists($pdfPath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($pdfFile) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($pdfPath));
        readfile($pdfPath);
        exit;
    } else {
        http_response_code(404);
        die("Berkas PDF tidak ditemukan pada server.");
    }
}

$fileSize = file_exists($pdfPath) ? round(filesize($pdfPath) / 1024, 1) . ' KB' : '90.4 KB';
$fileModifiedDate = file_exists($pdfPath) ? date('d M Y, H:i', filemtime($pdfPath)) : '20 Oktober 2026';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETS PBKK: SkillForge - Student Portfolio & Internship Readiness System</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css?v=<?= time() ?>">
    <style>
        /* --- Badge & Tag Styles --- */
        .badge-subject {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.84rem;
            font-weight: 600;
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            margin-bottom: 15px;
        }
        .badge-pill {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .badge-must {
            background: rgba(239, 68, 68, 0.12);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        .badge-should {
            background: rgba(245, 158, 11, 0.12);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        .badge-success {
            background: rgba(16, 185, 129, 0.15);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        .badge-tech {
            background: rgba(99, 102, 241, 0.12);
            color: #4f46e5;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* --- Milestone Progress Banner --- */
        .milestone-card {
            background: var(--bg-color);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-raised-sm);
            padding: 24px;
            margin: 25px 0 35px 0;
            border-left: 5px solid var(--pbkk-color);
        }
        .milestone-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }
        .milestone-header h3 {
            margin: 0;
            color: var(--text-heading);
            font-size: 1.15rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .milestone-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 15px;
        }
        .milestone-step {
            background: var(--bg-color);
            padding: 16px;
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-inset);
            position: relative;
        }
        .milestone-step.active {
            border: 1.5px solid #10b981;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(99, 102, 241, 0.03));
        }
        .milestone-step.in-progress {
            border: 1.5px solid var(--pbkk-color);
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(59, 130, 246, 0.03));
        }
        .milestone-step strong {
            display: block;
            color: var(--text-heading);
            font-size: 0.95rem;
            margin-bottom: 4px;
        }
        .milestone-step p {
            margin: 0;
            font-size: 0.83rem;
            color: var(--text-muted);
            line-height: 1.45;
        }

        /* --- PDF Download & Viewer Section --- */
        .download-box {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.08), rgba(99, 102, 241, 0.05));
            border: 1.5px solid rgba(124, 58, 237, 0.25);
            border-radius: var(--radius-md);
            padding: 24px 28px;
            margin: 25px 0 35px 0;
            box-shadow: var(--shadow-raised-sm);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .download-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .download-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            background: var(--bg-color);
            box-shadow: var(--shadow-raised-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            flex-shrink: 0;
            color: #dc2626;
        }
        .download-details h3 {
            margin: 0 0 5px 0;
            color: var(--text-heading);
            font-size: 1.15rem;
        }
        .download-meta {
            font-size: 0.86rem;
            color: var(--text-muted);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .download-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            font-size: 0.92rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            border: none;
        }
        .btn-download-primary {
            background: var(--pbkk-gradient);
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(124, 58, 237, 0.35);
        }
        .btn-download-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.45);
        }
        .btn-preview-secondary {
            background: var(--bg-color);
            color: var(--text-heading) !important;
            box-shadow: var(--shadow-raised-sm);
        }
        .btn-preview-secondary:hover {
            box-shadow: var(--shadow-inset);
            color: var(--pbkk-color) !important;
        }

        /* --- PDF Viewer Wrapper --- */
        .pdf-viewer-card {
            background: var(--bg-color);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-raised-sm);
            padding: 20px;
            margin: 20px 0 35px 0;
            display: none; /* toggle via JS */
        }
        .pdf-viewer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(163, 177, 198, 0.3);
        }
        .pdf-viewer-frame {
            width: 100%;
            height: 650px;
            border: none;
            border-radius: 12px;
            box-shadow: var(--shadow-inset);
            background: #ffffff;
        }

        /* --- Tab Navigasi Halaman (PRD vs Laporan) --- */
        .tab-switcher {
            display: flex;
            gap: 10px;
            background: var(--bg-color);
            padding: 8px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            margin: 30px 0 25px 0;
            overflow-x: auto;
        }
        .tab-btn {
            flex: 1;
            min-width: 180px;
            padding: 12px 18px;
            border: none;
            background: transparent;
            color: var(--text-muted);
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .tab-btn:hover {
            color: var(--text-heading);
        }
        .tab-btn.active {
            background: var(--bg-color);
            color: var(--pbkk-color);
            box-shadow: var(--shadow-raised-sm);
        }

        /* --- Team Meta Box --- */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 18px;
            margin: 20px 0 30px 0;
        }
        .team-card {
            background: var(--bg-color);
            padding: 18px 22px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-raised-sm);
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .team-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: var(--pbkk-gradient);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(124, 58, 237, 0.3);
            flex-shrink: 0;
        }
        .team-info h4 {
            margin: 0 0 4px 0;
            color: var(--text-heading);
            font-size: 1rem;
        }
        .team-info p {
            margin: 0;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        /* --- Formula & Simulation Box --- */
        .formula-card {
            background: var(--bg-color);
            padding: 22px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            margin: 20px 0;
            border-left: 4px solid var(--pbkk-color);
        }
        .formula-math {
            font-family: 'Fira Code', 'Consolas', monospace;
            background: #1e1e1e;
            color: #4ec9b0;
            padding: 14px 18px;
            border-radius: 8px;
            font-size: 0.95rem;
            margin: 12px 0;
            overflow-x: auto;
            line-height: 1.5;
        }
        .formula-math span.operator { color: #d4d4d4; }
        .formula-math span.func { color: #dcdcaa; }
        .formula-math span.param { color: #9cdcfe; }
        .formula-math span.comment { color: #6a9955; }

        /* --- Interactive Simulator Card --- */
        .simulator-container {
            background: var(--bg-color);
            padding: 25px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-raised-sm);
            margin: 25px 0;
        }
        .simulator-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 15px;
        }
        @media (max-width: 768px) {
            .simulator-grid {
                grid-template-columns: 1fr;
            }
        }
        .sim-checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 260px;
            overflow-y: auto;
            padding: 10px;
            border-radius: 8px;
            box-shadow: var(--shadow-inset);
        }
        .sim-checkbox-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            cursor: pointer;
        }
        .sim-result-card {
            background: var(--bg-color);
            padding: 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .sim-score-display {
            font-size: 3rem;
            font-weight: 700;
            color: var(--pbkk-color);
            margin: 10px 0;
        }
        .sim-status-badge {
            padding: 6px 18px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        /* --- Database & Architecture Visualizer --- */
        .erd-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
            margin: 20px 0;
        }
        .erd-table-card {
            background: var(--bg-color);
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-raised-sm);
            overflow: hidden;
            border-top: 4px solid var(--pbkk-color);
        }
        .erd-table-header {
            background: rgba(124, 58, 237, 0.1);
            padding: 10px 14px;
            font-weight: 700;
            color: var(--text-heading);
            font-size: 0.95rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .erd-table-body {
            padding: 12px 14px;
            font-family: 'Fira Code', 'Consolas', monospace;
            font-size: 0.82rem;
            color: var(--text-color);
            line-height: 1.6;
        }
        .erd-pk { color: #dc2626; font-weight: 600; }
        .erd-fk { color: #2563eb; font-weight: 600; }

        /* --- Copy Code Box & Terminal --- */
        .terminal-box {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 18px 20px;
            border-radius: 10px;
            font-family: 'Fira Code', 'Consolas', monospace;
            font-size: 0.9rem;
            margin: 15px 0;
            border-left: 4px solid var(--pbkk-color);
            overflow-x: auto;
            position: relative;
        }
        .terminal-box span.prompt { color: #4ec9b0; }
        .terminal-box span.keyword { color: #569cd6; }
        .terminal-box span.string { color: #ce9178; }
        .terminal-box span.comment { color: #6a9955; }
        .copy-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            cursor: pointer;
            transition: var(--transition);
        }
        .copy-btn:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        /* --- Test Scenario Table --- */
        .test-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: var(--bg-color);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-raised-sm);
        }
        .test-table th, .test-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid rgba(163, 177, 198, 0.3);
            font-size: 0.92rem;
        }
        .test-table th {
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            font-weight: 700;
        }

        /* --- Placeholder & Deliverables Box --- */
        .deliverable-box {
            background: var(--bg-color);
            padding: 24px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-raised-sm);
            margin: 20px 0;
            border-left: 4px solid #10b981;
        }
        .deliverable-meta {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .deliverable-meta a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--pbkk-color);
            font-weight: 600;
            text-decoration: none;
        }
        .deliverable-meta a:hover {
            text-decoration: underline;
        }
        .screenshot-placeholder-box {
            background-color: var(--bg-color);
            padding: 35px 25px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            text-align: center;
            margin: 20px 0;
        }
        .screenshot-placeholder-box h4 {
            margin: 10px 0 6px 0;
            color: var(--text-heading);
            font-size: 1.05rem;
        }
        .screenshot-placeholder-box p {
            margin: 0;
            font-size: 0.88rem;
            color: var(--text-muted);
        }

        /* Section Container */
        .tab-content-panel {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Tombol Kembali ke Daftar Tugas PBKK -->
        <div class="subportal-nav">
            <a href="../" class="tombol-kembali" style="margin-bottom:0;">&larr; Kembali ke Daftar Tugas PBKK</a>
            <span class="badge-course-type">
                <span class="badge-dot pbkk"></span> PBKK - Kelas D &bull; Evaluasi Tengah Semester
            </span>
        </div>

        <div class="konten-tugas">
            <span class="badge-subject">🏆 Evaluasi Tengah Semester (ETS) &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>SkillForge: Student Portfolio &amp; Internship Readiness System</h1>
            
            <div class="meta-info">
                <strong>Mata Kuliah:</strong> PBKK (Kelas D) &bull; 
                <strong>Arsitektur:</strong> C# .NET 8 WPF, MVVM Pattern &amp; Atomic SqlTransaction &bull; 
                <strong>Basis Data:</strong> Microsoft SQL Server &bull; 
                <strong>Kelompok:</strong> 10
            </div>

            <!-- Kartu Profil Tim Pengembang -->
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-avatar">FP</div>
                    <div class="team-info">
                        <h4>Farrel Prastita Ramadhan</h4>
                        <p>NRP: <strong>5025241219</strong> &bull; Kelompok 10</p>
                        <p style="font-size:0.8rem; color:var(--pbkk-color); font-weight:600; margin-top:2px;">Software Engineer / Co-Author PRD</p>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-avatar">AP</div>
                    <div class="team-info">
                        <h4>Ageng Prayogo</h4>
                        <p>NRP: <strong>5025241225</strong> &bull; Kelompok 10</p>
                        <p style="font-size:0.8rem; color:var(--pbkk-color); font-weight:600; margin-top:2px;">Software Engineer / Co-Author PRD</p>
                    </div>
                </div>
            </div>

            <!-- Milestone Tracker / Status Proyek ETS -->
            <div class="milestone-card">
                <div class="milestone-header">
                    <h3><span>📌</span> Status &amp; Alur Pelaksanaan Proyek ETS</h3>
                    <span class="badge-pill badge-success">Solusi .NET 8 &amp; Database Selesai (v1.0)</span>
                </div>
                <div class="milestone-steps">
                    <div class="milestone-step active">
                        <strong>Fase 1: Dokumen PRD (Selesai)</strong>
                        <p>Penyusunan Product Requirements Document lengkap (12 Halaman): ruang lingkup, 14 FR, formula skor kesiapan, dan skema relasional 8 tabel.</p>
                    </div>
                    <div class="milestone-step active">
                        <strong>Fase 2: Implementasi Solusi &amp; UI/UX Shadcn (Selesai)</strong>
                        <p>Pengembangan aplikasi desktop WPF .NET 8, modul MVVM, skrip DDL SQL Server LocalDB, tema modern Shadcn Zinc bebas emoji (100% Vector Geometries), dan engine kesiapan industri.</p>
                    </div>
                    <div class="milestone-step active">
                        <strong>Fase 3: Pengujian, Laporan &amp; Demo (Selesai)</strong>
                        <p>Pengujian 6 skenario fungsional lulus 100%, jawaban 3 butir soal ETS, publikasi poster infografis 1 halaman, dan arsip kode sumber lengkap di folder <code>demo/</code>.</p>
                    </div>
                </div>
            </div>

            <!-- Hero Download & Preview PRD Box -->
            <div class="download-box" id="unduh-prd">
                <div class="download-info">
                    <div class="download-icon">📄</div>
                    <div class="download-details">
                        <h3>Berkas Dokumen Resmi PRD (Product Requirements Document)</h3>
                        <div class="download-meta">
                            <span><strong>Nama Berkas:</strong> <?= htmlspecialchars($pdfFile) ?></span>
                            <span><strong>Ukuran:</strong> <?= $fileSize ?></span>
                            <span><strong>Versi:</strong> 1.0 (ETS PBKK)</span>
                            <span><strong>Update:</strong> <?= $fileModifiedDate ?></span>
                        </div>
                    </div>
                </div>
                <div class="download-actions">
                    <!-- Direct Download Button via PHP handler -->
                    <a href="?download=pdf" class="btn-action btn-download-primary" title="Unduh Berkas PRD PDF Langsung">
                        <span>📥</span> Unduh PDF Langsung
                    </a>
                    <!-- Direct Download Native Fallback -->
                    <a href="<?= htmlspecialchars($pdfFile) ?>" download="<?= htmlspecialchars($pdfFile) ?>" class="btn-action btn-preview-secondary" title="Simpan ke Perangkat">
                        <span>💾</span> Simpan As
                    </a>
                    <!-- Toggle In-Page Preview -->
                    <button type="button" onclick="togglePdfViewer()" class="btn-action btn-preview-secondary" id="btnTogglePreview">
                        <span>👁️</span> Pratinjau Dokumen
                    </button>
                    <!-- Open in New Tab -->
                    <a href="<?= htmlspecialchars($pdfFile) ?>" target="_blank" rel="noopener noreferrer" class="btn-action btn-preview-secondary">
                        <span>↗️</span> Tab Baru
                    </a>
                </div>
            </div>

            <!-- In-Page Embedded PDF Viewer (Toggleable) -->
            <div class="pdf-viewer-card" id="pdfViewerCard">
                <div class="pdf-viewer-header">
                    <h4 style="margin:0; color:var(--text-heading); font-size:1.05rem; display:flex; align-items:center; gap:8px;">
                        <span>📑</span> Pratinjau Dokumen PRD: <?= htmlspecialchars($pdfFile) ?>
                    </h4>
                    <div style="display:flex; gap:10px;">
                        <a href="<?= htmlspecialchars($pdfFile) ?>" target="_blank" class="btn-action btn-preview-secondary" style="padding:6px 12px; font-size:0.8rem;">
                            Buka Layar Penuh ↗
                        </a>
                        <button type="button" onclick="togglePdfViewer()" class="btn-action btn-preview-secondary" style="padding:6px 12px; font-size:0.8rem;">
                            Tutup Pratinjau ✕
                        </button>
                    </div>
                </div>
                <iframe src="<?= htmlspecialchars($pdfFile) ?>#toolbar=1&navpanes=1" class="pdf-viewer-frame" title="PRD SkillForge PDF Viewer">
                    <p>Browser Anda tidak mendukung iframe PDF. Silakan <a href="?download=pdf">unduh berkas PDF di sini</a>.</p>
                </iframe>
            </div>

            <hr>

            <!-- Tab Switcher Navigasi Antara PRD dan Laporan Proyek -->
            <div class="tab-switcher">
                <button type="button" class="tab-btn active" onclick="switchTab('tab-prd', this)">
                    <span>📑</span> 1. Ringkasan Dokumen PRD
                </button>
                <button type="button" class="tab-btn" onclick="switchTab('tab-arsitektur', this)">
                    <span>🏗️</span> 2. Arsitektur &amp; Basis Data
                </button>
                <button type="button" class="tab-btn" onclick="switchTab('tab-simulator', this)">
                    <span>🧮</span> 3. Simulasi Readiness Engine
                </button>
                <button type="button" class="tab-btn" onclick="switchTab('tab-laporan', this)">
                    <span>📊</span> 4. Laporan, Jawaban ETS &amp; Poster Infografis
                </button>
                <button type="button" class="tab-btn" onclick="showAllTabs(this)">
                    <span>📜</span> Tampilkan Semua Bagian
                </button>
            </div>

            <!-- ==========================================================================
                 BAGIAN 1: RINGKASAN DOKUMEN PRD (PRODUCT REQUIREMENTS DOCUMENT)
                 ========================================================================== -->
            <div id="tab-prd" class="tab-content-panel">
                <h2>1. Ringkasan Eksekutif &amp; Pernyataan Masalah</h2>
                <p>
                    <strong>SkillForge</strong> adalah aplikasi desktop modern berbasis <strong>Rich UI</strong> (.NET 8 WPF dan SQL Server) yang dirancang untuk membantu mahasiswa teknologi informasi mengelola, mendokumentasikan, dan mengevaluasi portofolio proyek akademik maupun mandiri. Sistem ini mengintegrasikan katalog portofolio berbasis <em>tech-stack</em> dengan <strong>Mesin Asesmen Kesiapan Otomatis</strong> untuk mengukur keselarasan kompetensi mahasiswa terhadap standar profil magang industri (seperti <em>Full-Stack Engineer</em>, <em>Backend Engineer</em>, <em>Data Analyst</em>, dan <em>DevOps Intern</em>).
                </p>

                <div class="qa-box">
                    <h4>💡 Pernyataan Produk (Product Statement)</h4>
                    <p>
                        <em>"Untuk mahasiswa rumpun informatika yang mengalami kesulitan memetakan kompetensi dan bukti karya saat mendaftar magang industri, <strong>SkillForge</strong> menyediakan aplikasi desktop Rich UI terintegrasi yang menggabungkan manajemen inventaris proyek, pemetaan matriks kompetensi, kalkulasi kesiapan peran secara objektif, serta visualisasi kapabilitas personal dalam satu lingkungan kerja yang cepat, aman, dan terstruktur."</em>
                    </p>
                </div>

                <h3>Empat Permasalahan Utama yang Diselesaikan</h3>
                <div class="code-summary-grid">
                    <div class="code-summary-box">
                        <h4>🗂️ Fragmentasi Bukti Karya</h4>
                        <p>Tugas besar kuliah dan praktikum mahasiswa sering tersimpan tidak teratur tanpa metadata peran, arsitektur, dan teknologi yang terverifikasi.</p>
                    </div>
                    <div class="code-summary-box">
                        <h4>🎯 Skill Gap Blindness</h4>
                        <p>Mahasiswa kerap melamar posisi magang tanpa mengetahui secara objektif apakah portofolionya telah memenuhi kualifikasi teknis wajib industri.</p>
                    </div>
                    <div class="code-summary-box">
                        <h4>🔍 Evidence of Work</h4>
                        <p>CV konvensional memuat klaim keterampilan tanpa didukung pembuktian artefak proyek, tautan repositori, dan dokumentasi visual teknis.</p>
                    </div>
                    <div class="code-summary-box">
                        <h4>👨‍🏫 Evaluasi Reviewer</h4>
                        <p>Dosen pembimbing atau mentor kampus membutuhkan instrumen terpusat untuk memantau kapabilitas teknis mahasiswa secara transparan (Mode Reviewer).</p>
                    </div>
                </div>

                <hr>

                <h2>2. Sasaran Produk, Pengguna, dan Batasan Sistem</h2>
                <table class="test-table">
                    <thead>
                        <tr>
                            <th style="width: 22%;">Peran Pengguna</th>
                            <th style="width: 38%;">Kebutuhan Utama</th>
                            <th style="width: 40%;">Hak Akses Sistem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Mahasiswa (Student / Owner)</strong></td>
                            <td>Mencatat proyek, memilih tag keahlian, memantau skor kesiapan magang, dan mengekspor resume portofolio.</td>
                            <td><span class="badge-pill badge-success">Akses Penuh (CRUD)</span> ke portofolio pribadi, modul asesmen, dan pengaturan tema.</td>
                        </tr>
                        <tr>
                            <td><strong>Mentor / Reviewer Kampus</strong></td>
                            <td>Meninjau kelayakan portofolio teknis mahasiswa, memverifikasi artefak, dan memberikan catatan telaah.</td>
                            <td><span class="badge-pill badge-should">Akses Baca (Read-Only)</span> ke Dashboard, Katalog Proyek, dan Matriks Kesiapan. Tombol edit/hapus dinonaktifkan.</td>
                        </tr>
                        <tr>
                            <td><strong>Tamu / Belum Login</strong></td>
                            <td>Masuk ke dalam sistem menggunakan akun terdaftar atau mendaftarkan akun mahasiswa baru.</td>
                            <td>Hanya dapat mengakses tampilan Login dan Registrasi Akun.</td>
                        </tr>
                    </tbody>
                </table>

                <hr>

                <h2>3. Matriks Kebutuhan Fungsional (14 Functional Requirements)</h2>
                <p>Berdasarkan Dokumen PRD Seksi 7, kebutuhan sistem diklasifikasikan dengan prioritas <strong>MUST</strong> dan <strong>SHOULD</strong>:</p>

                <table class="test-table">
                    <thead>
                        <tr>
                            <th style="width: 80px;">ID</th>
                            <th style="width: 220px;">Fitur</th>
                            <th>Deskripsi Persyaratan Fungsional</th>
                            <th style="width: 90px;">Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>FR-01</code></td>
                            <td><strong>Autentikasi &amp; Sesi</strong></td>
                            <td>Sistem memvalidasi login menggunakan kredensial terdaftar (hash password), menolak akses ilegal, dan membersihkan sesi saat logout.</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-02</code></td>
                            <td><strong>Otorisasi Berbasis Peran</strong></td>
                            <td>Sistem membatasi hak operasi CRUD hanya untuk akun Student; akun Reviewer terkunci pada mode pembacaan data (Read-Only).</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-03</code></td>
                            <td><strong>Dashboard Metrik KPI</strong></td>
                            <td>Sistem menghitung dan menyajikan 4 metrik agregasi riil dari SQL Server: Total Proyek, Total Skill Terbukti, Skor Kesiapan Tertinggi, dan Target Aktif.</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-04</code></td>
                            <td><strong>Visualisasi Radar Chart</strong></td>
                            <td>Sistem merender grafik spider/radar kompetensi dinamis berdasarkan agregasi pembobotan proyek pada tiap kategori keahlian.</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-05</code></td>
                            <td><strong>CRUD Master Proyek</strong></td>
                            <td>Pengguna dapat menambah, melihat, mengubah, dan menghapus metadata proyek (Judul, Deskripsi, Tingkat Kesulitan, Repo Git, Cover Image).</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-06</code></td>
                            <td><strong>Multi-Tagging Keahlian</strong></td>
                            <td>Sistem mengaitkan entri proyek dengan banyak tag teknologi secara relasional (Many-to-Many pada tabel <code>ProjectSkills</code>).</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-07</code></td>
                            <td><strong>Pencarian &amp; Filter Cepat</strong></td>
                            <td>Pencarian instan berbasis kata kunci judul dan penyaringan multi-kategori (mata kuliah, tingkat kesulitan, atau tag keahlian spesifik).</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-08</code></td>
                            <td><strong>Kalkulasi Kesiapan Magang</strong></td>
                            <td>Mesin matematis membandingkan portofolio keahlian mahasiswa terhadap bobot kebutuhan peran magang industri terpilih.</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-09</code></td>
                            <td><strong>Identifikasi Skill Gap</strong></td>
                            <td>Sistem memisahkan dan menandai keahlian yang telah terpenuhi (badge hijau) serta keahlian wajib yang belum dikuasai (badge merah).</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-10</code></td>
                            <td><strong>Validasi Input &amp; Integritas</strong></td>
                            <td>Form menolak input kosong, memvalidasi URL repositori, dan mencegah duplikasi relasi tag keahlian.</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-11</code></td>
                            <td><strong>Manajemen Master Skill</strong></td>
                            <td>Pengguna dapat mendaftarkan keahlian teknologi baru ke dalam kategori spesifik (Frontend, Backend, Database, AI/ML, DevOps, UI/UX).</td>
                            <td><span class="badge-pill badge-should">SHOULD</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-12</code></td>
                            <td><strong>Tema Dinamis (Dark/Light)</strong></td>
                            <td>Mendukung peralihan tema antarmuka secara instan menggunakan <code>DynamicResource</code> XAML tanpa merusak kontras visual.</td>
                            <td><span class="badge-pill badge-should">SHOULD</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-13</code></td>
                            <td><strong>Ekspor Dokumen Ringkasan</strong></td>
                            <td>Sistem mampu mengompilasi portofolio terpilih menjadi ringkasan terstruktur untuk persiapan bimbingan dosen atau lamaran kerja.</td>
                            <td><span class="badge-pill badge-should">SHOULD</span></td>
                        </tr>
                        <tr>
                            <td><code>FR-14</code></td>
                            <td><strong>Notifikasi &amp; Error Handling</strong></td>
                            <td>Menampilkan feedback toast/dialog informatif saat operasi berhasil/gagal serta menangani pemutusan koneksi SQL Server secara anggun.</td>
                            <td><span class="badge-pill badge-must">MUST</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- ==========================================================================
                 BAGIAN 2: ARSITEKTUR SISTEM & RANCANGAN BASIS DATA
                 ========================================================================== -->
            <div id="tab-arsitektur" class="tab-content-panel">
                <h2>4. Arsitektur Perangkat Lunak (.NET 8 WPF MVVM + Repository)</h2>
                <p>
                    Aplikasi SkillForge dibangun dengan mematuhi prinsip <em>Separation of Concerns</em> (SoC) melalui pola desain <strong>Model-View-ViewModel (MVVM)</strong> murni yang dipadukan dengan <strong>Repository Pattern</strong> dan <strong>Atomic SQL Transactions</strong>:
                </p>

                <div class="architecture-card">
                    <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem;">🏗️ Lapisan Arsitektur Solusi SkillForge</h3>
                    <div class="architecture-grid">
                        <div class="architecture-step">
                            <strong>1. View Layer (XAML)</strong>
                            <span>Deklarasi UI modern WPF: `MainWindow.xaml`, `DashboardView.xaml`, `ProjectsView.xaml`, `ReadinessView.xaml`, Resources Styling &amp; DynamicResource Dark/Light.</span>
                        </div>
                        <div class="architecture-step">
                            <strong>2. ViewModel Layer</strong>
                            <span>State UI reaktif: `DashboardViewModel.cs`, `ProjectCatalogViewModel.cs`, implementasi `INotifyPropertyChanged`, `ObservableCollection&lt;T&gt;`, dan `RelayCommand`.</span>
                        </div>
                        <div class="architecture-step">
                            <strong>3. Service Layer (Business Logic)</strong>
                            <span>Algoritma mandiri tanpa dependensi UI: `ReadinessCalculatorService.cs`, `AuthenticationService.cs`, kalkulasi skor pembobotan, dan verifikasi gap skill.</span>
                        </div>
                        <div class="architecture-step">
                            <strong>4. Repository Layer (Data Access)</strong>
                            <span>Eksekusi ADO.NET murni via `SqlTransaction`, parameterized queries: `ProjectRepository.cs`, `SkillRepository.cs`, `RoleRepository.cs`.</span>
                        </div>
                        <div class="architecture-step">
                            <strong>5. Model Layer (Domain Entities)</strong>
                            <span>Entitas domain &amp; DTO: `Project.cs`, `Skill.cs`, `InternshipRole.cs`, `User.cs`, dan `ReadinessResultDto.cs`.</span>
                        </div>
                    </div>
                </div>

                <hr>

                <h2>5. Rancangan Basis Data Relasional (7 Entitas SQL Server)</h2>
                <p>
                    Basis data <code>SkillForge_DB</code> dirancang menggunakan 7 tabel relasional yang dinormalisasi dengan Foreign Keys untuk menjamin integritas referensial:
                </p>

                <div class="erd-grid">
                    <div class="erd-table-card">
                        <div class="erd-table-header">
                            <span>👤 Users</span>
                            <span class="badge-pill badge-tech">Auth</span>
                        </div>
                        <div class="erd-table-body">
                            <span class="erd-pk">PK</span> UserId : INT (IDENTITY)<br>
                            &bull; Username : NVARCHAR(50) UNIQUE<br>
                            &bull; PasswordHash : NVARCHAR(256)<br>
                            &bull; FullName : NVARCHAR(100)<br>
                            &bull; Role : NVARCHAR(20) [Student|Reviewer]<br>
                            &bull; CreatedAt : DATETIME
                        </div>
                    </div>

                    <div class="erd-table-card">
                        <div class="erd-table-header">
                            <span>🏷️ SkillCategories</span>
                            <span class="badge-pill badge-tech">Master</span>
                        </div>
                        <div class="erd-table-body">
                            <span class="erd-pk">PK</span> CategoryId : INT (IDENTITY)<br>
                            &bull; CategoryName : NVARCHAR(50)<br>
                            &bull; ColorHex : NVARCHAR(10)<br>
                            <span style="color:var(--text-muted); font-size:0.75rem;">(Frontend, Backend, DB, AI, DevOps)</span>
                        </div>
                    </div>

                    <div class="erd-table-card">
                        <div class="erd-table-header">
                            <span>⚡ Skills</span>
                            <span class="badge-pill badge-tech">Master</span>
                        </div>
                        <div class="erd-table-body">
                            <span class="erd-pk">PK</span> SkillId : INT (IDENTITY)<br>
                            <span class="erd-fk">FK</span> CategoryId : INT &rarr; SkillCategories<br>
                            &bull; SkillName : NVARCHAR(50) UNIQUE<br>
                            &bull; Description : NVARCHAR(200)
                        </div>
                    </div>

                    <div class="erd-table-card">
                        <div class="erd-table-header">
                            <span>📦 Projects</span>
                            <span class="badge-pill badge-tech">Core</span>
                        </div>
                        <div class="erd-table-body">
                            <span class="erd-pk">PK</span> ProjectId : INT (IDENTITY)<br>
                            <span class="erd-fk">FK</span> UserId : INT &rarr; Users<br>
                            &bull; Title : NVARCHAR(150)<br>
                            &bull; Description : NVARCHAR(MAX)<br>
                            &bull; CourseName : NVARCHAR(100)<br>
                            &bull; DifficultyLevel : INT [1|2|3]<br>
                            &bull; RepoUrl : NVARCHAR(255)<br>
                            &bull; DemoUrl : NVARCHAR(255)<br>
                            &bull; CoverImagePath : NVARCHAR(255)
                        </div>
                    </div>

                    <div class="erd-table-card">
                        <div class="erd-table-header">
                            <span>🔗 ProjectSkills</span>
                            <span class="badge-pill badge-tech">Associative</span>
                        </div>
                        <div class="erd-table-body">
                            <span class="erd-pk">PK</span> ProjectSkillId : INT (IDENTITY)<br>
                            <span class="erd-fk">FK</span> ProjectId : INT &rarr; Projects<br>
                            <span class="erd-fk">FK</span> SkillId : INT &rarr; Skills<br>
                            <span style="color:var(--text-muted); font-size:0.75rem;">(Relasi N-to-M Proyek &amp; Keahlian)</span>
                        </div>
                    </div>

                    <div class="erd-table-card">
                        <div class="erd-table-header">
                            <span>💼 InternshipRoles</span>
                            <span class="badge-pill badge-tech">Master</span>
                        </div>
                        <div class="erd-table-body">
                            <span class="erd-pk">PK</span> RoleId : INT (IDENTITY)<br>
                            &bull; RoleTitle : NVARCHAR(100)<br>
                            &bull; Description : NVARCHAR(MAX)<br>
                            &bull; MinProjectCount : INT
                        </div>
                    </div>

                    <div class="erd-table-card">
                        <div class="erd-table-header">
                            <span>🎯 RoleRequirements</span>
                            <span class="badge-pill badge-tech">Requirement</span>
                        </div>
                        <div class="erd-table-body">
                            <span class="erd-pk">PK</span> RequirementId : INT (IDENTITY)<br>
                            <span class="erd-fk">FK</span> RoleId : INT &rarr; InternshipRoles<br>
                            <span class="erd-fk">FK</span> SkillId : INT &rarr; Skills<br>
                            &bull; ImportanceLevel : INT [3=Wajib, 2=Anjuran, 1=Opsional]
                        </div>
                    </div>
                </div>

                <h3>Cuplikan Skrip DDL Basis Data (SQL Server)</h3>
                <div class="terminal-box">
                    <button class="copy-btn" onclick="copySqlCode(this)">Copy SQL</button>
                    <pre id="sqlSnippet" style="margin:0; font-family:inherit;"><span class="keyword">CREATE DATABASE</span> SkillForge_DB;
<span class="keyword">GO</span>
<span class="keyword">USE</span> SkillForge_DB;

<span class="comment">-- 1. Tabel Users</span>
<span class="keyword">CREATE TABLE</span> Users (
    UserId <span class="keyword">INT IDENTITY</span>(1,1) <span class="keyword">PRIMARY KEY</span>,
    Username <span class="keyword">NVARCHAR</span>(50) <span class="keyword">NOT NULL UNIQUE</span>,
    PasswordHash <span class="keyword">NVARCHAR</span>(256) <span class="keyword">NOT NULL</span>,
    FullName <span class="keyword">NVARCHAR</span>(100) <span class="keyword">NOT NULL</span>,
    Role <span class="keyword">NVARCHAR</span>(20) <span class="keyword">DEFAULT</span> <span class="string">'Student'</span>,
    CreatedAt <span class="keyword">DATETIME DEFAULT GETDATE</span>()
);

<span class="comment">-- 2. Transaksi Atomik Penyimpanan Proyek beserta Many-to-Many Tag Keahlian</span>
<span class="keyword">BEGIN TRANSACTION</span>;
<span class="keyword">BEGIN TRY</span>
    <span class="keyword">INSERT INTO</span> Projects (UserId, Title, CourseName, DifficultyLevel, RepoUrl)
    <span class="keyword">VALUES</span> (@UserId, @Title, @CourseName, @Difficulty, @RepoUrl);
    
    <span class="keyword">DECLARE</span> @NewProjId <span class="keyword">INT</span> = <span class="keyword">SCOPE_IDENTITY</span>();
    
    <span class="keyword">INSERT INTO</span> ProjectSkills (ProjectId, SkillId)
    <span class="keyword">SELECT</span> @NewProjId, Value <span class="keyword">FROM STRING_SPLIT</span>(@SkillIdsCsv, <span class="string">','</span>);
    
    <span class="keyword">COMMIT TRANSACTION</span>;
<span class="keyword">END TRY</span>
<span class="keyword">BEGIN CATCH</span>
    <span class="keyword">ROLLBACK TRANSACTION</span>;
    <span class="keyword">THROW</span>;
<span class="keyword">END CATCH</span>;</pre>
                </div>
            </div>

            <!-- ==========================================================================
                 BAGIAN 3: SIMULASI MATEMATIS READINESS ENGINE
                 ========================================================================== -->
            <div id="tab-simulator" class="tab-content-panel">
                <h2>6. Logika Bisnis &amp; Formula Matematis Kesiapan Magang</h2>
                <p>
                    Mesin evaluasi kesiapan pada kelas <code>ReadinessCalculatorService.cs</code> menerapkan kalkulasi matematis objektif berbasis bobot proyek dan tingkat kepentingan peran:
                </p>

                <div class="formula-card">
                    <h4>Rumus 1: Skor Pembuktian Keahlian (Skill Score)</h4>
                    <p>Tingkat penguasaan keahlian $s$ dihitung dari akumulasi bobot proyek $p$ yang menggunakan keahlian tersebut:</p>
                    <div class="formula-math">
                        <span class="func">SkillScore</span>(<span class="param">s</span>) <span class="operator">=</span> &Sigma; <span class="param">W_proj</span>(<span class="param">p</span>)<br>
                        <span class="comment">// Bobot Proyek (W_proj): Dasar = 1.0 | Menengah = 1.5 | Kompleks = 2.0</span>
                    </div>
                    <p style="margin:0; font-size:0.86rem; color:var(--text-muted);">
                        <em>* Suatu keahlian dinyatakan <strong>Terpenuhi (Matched)</strong> apabila $SkillScore(s) \geq 1.0$ (minimal terbukti pada 1 proyek).</em>
                    </p>
                </div>

                <div class="formula-card">
                    <h4>Rumus 2: Skor Kesiapan Peran Magang (Role Readiness Score)</h4>
                    <p>Dihitung dengan membandingkan bobot kepentingan keahlian yang telah terpenuhi terhadap total seluruh bobot syarat peran magang:</p>
                    <div class="formula-math">
                        <span class="func">ReadinessScore</span>(<span class="param">R</span>) <span class="operator">=</span> [ &Sigma; <span class="param">I_s</span> (untuk <span class="param">s</span> &isin; SkillsTerpenuhi) <span class="operator">/</span> &Sigma; <span class="param">I_s</span> (seluruh syarat peran) ] <span class="operator">&times;</span> 100%<br>
                        <span class="comment">// Bobot Kepentingan (I_s): Wajib (Mandatory) = 3.0 | Anjuran = 2.0 | Opsional = 1.0</span>
                    </div>
                </div>

                <div class="code-summary-grid">
                    <div class="code-summary-box" style="border-top:3px solid #10b981;">
                        <h4 style="color:#059669;">🟢 Job Ready (&ge; 80%)</h4>
                        <p>Readiness Score &ge; 80% <strong>DAN</strong> seluruh keahlian berstatus Wajib (Mandatory) telah terpenuhi. Mahasiswa siap mengajukan lamaran magang.</p>
                    </div>
                    <div class="code-summary-box" style="border-top:3px solid #f59e0b;">
                        <h4 style="color:#d97706;">🟡 Needs Improvement (50% - 79%)</h4>
                        <p>Kandidat memiliki fondasi yang cukup, namun masih memiliki gap keterampilan atau kekurangan pembuktian proyek pada keahlian inti.</p>
                    </div>
                    <div class="code-summary-box" style="border-top:3px solid #ef4444;">
                        <h4 style="color:#dc2626;">🔴 Underqualified (&lt; 50%)</h4>
                        <p>Portofolio proyek belum memadai untuk peran yang ditargetkan. Sistem menyarankan rekomendasi proyek latihan spesifik.</p>
                    </div>
                </div>

                <!-- Simulator Interaktif di Halaman Web -->
                <div class="simulator-container">
                    <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem; display:flex; align-items:center; gap:8px;">
                        <span>🎛️</span> Simulator Interaktif Mesin Asesmen Kesiapan SkillForge
                    </h3>
                    <p style="font-size:0.9rem; color:var(--text-muted); margin-bottom:15px;">
                        Uji coba langsung logika kalkulasi <code>ReadinessCalculatorService</code>. Pilih target peran dan centang keahlian yang dimiliki mahasiswa di bawah ini untuk melihat skor dan status otomatis:
                    </p>

                    <div style="margin-bottom:15px;">
                        <label for="roleSelector" style="font-weight:600; font-size:0.92rem; color:var(--text-heading); display:block; margin-bottom:6px;">
                            Pilih Target Peran Magang:
                        </label>
                        <select id="roleSelector" onchange="updateSimulation()" style="width:100%; max-width:400px; padding:10px 14px; border-radius:8px; border:1px solid rgba(163,177,198,0.5); background:var(--bg-color); font-family:inherit; font-size:0.92rem; color:var(--text-heading); box-shadow:var(--shadow-inset);">
                            <option value="software_engineer">Software Engineer Intern (C#, WPF, SQL Server, Git)</option>
                            <option value="fullstack_intern">Full-Stack Engineer Intern (React, ASP.NET, SQL, Docker)</option>
                            <option value="data_analyst">Data Analyst Intern (Python, SQL, PowerBI/Excel)</option>
                        </select>
                    </div>

                    <div class="simulator-grid">
                        <div>
                            <h4 style="margin:0 0 8px 0; color:var(--text-heading); font-size:0.95rem;">Daftar Kualifikasi Keahlian Peran:</h4>
                            <div class="sim-checkbox-group" id="skillsCheckboxContainer">
                                <!-- Populated dynamically by JS -->
                            </div>
                        </div>

                        <div class="sim-result-card">
                            <span style="font-size:0.85rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.5px;">Hasil Kalkulasi Kesiapan</span>
                            <div class="sim-score-display" id="simScoreText">0.0%</div>
                            <div id="simStatusBadge" class="sim-status-badge badge-must">Underqualified</div>
                            <p id="simDetailText" style="font-size:0.85rem; color:var(--text-muted); margin:12px 0 0 0; line-height:1.4;">
                                Memuat kalkulasi...
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ==========================================================================
                 BAGIAN 4: LAPORAN PROYEK ETS & DOKUMENTASI IMPLEMENTASI
                 ========================================================================== -->
            <div id="tab-laporan" class="tab-content-panel">
                <h2>7. Laporan Perkembangan Proyek ETS &amp; Hasil Implementasi</h2>
                <p>
                    Bagian ini memuat <strong>Laporan Resmi Hasil Implementasi Proyek ETS PBKK</strong>. Mahasiswa dan dosen pengampu dapat mengakses repositori kode sumber, direktori demo lokal, panduan eksekusi aplikasi tanpa Visual Studio Community, serta hasil matriks pengujian fungsionalitas sistem:
                </p>

                <!-- Box Artefak & Repositori -->
                <div class="deliverable-box">
                    <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem; display:flex; align-items:center; gap:8px;">
                        <span>📦</span> Informasi Repositori &amp; Artefak Proyek ETS
                    </h3>
                    <p style="margin:0 0 12px 0; font-size:0.92rem; color:var(--text-color);">
                        Seluruh artefak pengembangan aplikasi <strong>SkillForge</strong> (Solusi .NET 8 WPF, skrip basis data SQL Server, dan dokumentasi lengkap) telah disalin dan diarsipkan secara terpusat:
                    </p>
                    <div class="deliverable-meta">
                        <span class="badge-tech">Solution: .NET 8 (net8.0-windows)</span>
                        <span class="badge-tech">UI Framework: WPF (Windows Presentation Foundation)</span>
                        <span class="badge-tech">UI Style: Modern Shadcn Zinc (100% Vector Geometries)</span>
                        <span class="badge-tech">Database: Microsoft SQL Server LocalDB (SkillForge_DB)</span>
                        <span class="badge-tech">Status: Teruji &amp; Siap Dinilai (ETS PBKK)</span>
                    </div>

                    <div style="margin-top:18px; padding-top:14px; border-top:1px solid rgba(163,177,198,0.3); display:flex; gap:12px; flex-wrap:wrap;">
                        <a href="demo/" target="_blank" class="btn-action btn-preview-secondary" style="font-size:0.85rem; padding:8px 14px; background:rgba(16,185,129,0.15); color:#10B981; border:1px solid rgba(16,185,129,0.3); font-weight:600;">
                            <span>📁</span> Buka Folder Demo Kode Sumber (demo/)
                        </a>
                        <a href="https://github.com/Parellllll/SkillForge" target="_blank" class="btn-action btn-preview-secondary" style="font-size:0.85rem; padding:8px 14px;">
                            <span>🐙</span> GitHub: <em>Parellllll/SkillForge</em>
                        </a>
                        <a href="https://github.com/YOGA3321/tugas-pweb---pbo" target="_blank" class="btn-action btn-preview-secondary" style="font-size:0.85rem; padding:8px 14px;">
                            <span>🐙</span> GitHub: <em>YOGA3321/tugas-pweb---pbo</em>
                        </a>
                        <a href="PRD_SkillForge_ETS_PBKK.pdf" download class="btn-action btn-preview-secondary" style="font-size:0.85rem; padding:8px 14px;">
                            <span>📄</span> Berkas PRD PDF (v1.0)
                        </a>
                    </div>
                </div>

                <!-- Panduan Cepat Menjalankan Aplikasi -->
                <div class="terminal-box" style="margin-top:20px;">
                    <div class="terminal-header">
                        <div class="terminal-dots">
                            <span class="terminal-dot dot-red"></span>
                            <span class="terminal-dot dot-yellow"></span>
                            <span class="terminal-dot dot-green"></span>
                        </div>
                        <span class="terminal-title">PANDUAN EKSEKUSI APLIKASI SKILLFORGE (CLI &amp; DESKTOP)</span>
                        <span style="font-size:0.75rem; color:#94a3b8;">PowerShell / Bash</span>
                    </div>
                    <pre><code><span style="color:#6ee7b7;"># 1. Masuk ke folder demo proyek ETS</span>
cd "C:\laragon\www	ugas\pbkk\ets\demo"

<span style="color:#6ee7b7;"># 2. Setup Basis Data SQL Server LocalDB (Jalankan skrip DDL &amp; Seed Data)</span>
sqlcmd -S "(localdb)\MSSQLLocalDB" -i "database_setup.sql"

<span style="color:#6ee7b7;"># 3. Jalankan aplikasi langsung via Terminal (Ringan tanpa perlu Visual Studio Community!)</span>
dotnet run --project SkillForge\SkillForge.csproj

<span style="color:#94a3b8;"># Catatan: Di komputer cukup terpasang .NET Desktop Runtime 8.0 (~55 MB) dan SQL Server LocalDB.</span>
<span style="color:#94a3b8;"># Jendela GUI aplikasi WPF bertema Shadcn Zinc akan langsung tampil di layar desktop Anda.</span></code></pre>
                </div>

                <h3 style="margin-top:30px;">Tabel Skenario Pengujian Fungsionalitas Sistem (Test Matrix)</h3>
                <table class="test-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Area Pengujian</th>
                            <th>Skenario Masukan</th>
                            <th>Hasil Pengujian &amp; Bukti Riil</th>
                            <th style="width: 120px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><strong>Relasi N-to-M Proyek &amp; Skill</strong></td>
                            <td>Menyimpan karya proyek baru melalui modal dialog <code>AddProjectWindow</code> dengan multi-skill tag.</td>
                            <td>Data tersimpan atomik pada tabel <code>Projects</code> dan relasi berelasi tepat pada tabel <code>ProjectSkills</code> di SQL Server LocalDB.</td>
                            <td><span class="status-badge-ok">&#10003; 100% Lolos</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>Akurasi Mesin Kesiapan Magang</strong></td>
                            <td>Memilih lowongan magang target (*.NET Desktop Engineer Intern*) dengan bobot syarat wajib (3.0), disarankan (2.0), opsional (1.0).</td>
                            <td>Sistem menghitung persentase kualifikasi tepat 80.0% dengan label status <em>Job Ready</em> dan menandai gap kompetensi secara presisi.</td>
                            <td><span class="status-badge-ok">&#10003; 100% Lolos</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>Pencarian Portofolio Real-Time</strong></td>
                            <td>Mengetikkan kata kunci mata kuliah atau judul proyek pada search bar portofolio.</td>
                            <td>Tabel <code>FilteredProjects</code> terfilter instan secara reaktif via MVVM pattern tanpa lag ataupun reload database berulang.</td>
                            <td><span class="status-badge-ok">&#10003; 100% Lolos</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>Ekspor Portofolio ke Markdown (.md)</strong></td>
                            <td>Menekan tombol <em>Ekspor Portofolio (.md)</em> pada halaman manajemen portofolio.</td>
                            <td>Sistem mengompilasi seluruh rekam jejak tugas besar mahasiswa dan menghasilkan file <code>SkillForge_Portofolio_Farrel.md</code> di folder Desktop secara rapi.</td>
                            <td><span class="status-badge-ok">&#10003; 100% Lolos</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><strong>Mode Gelap &amp; Terang Dinamis (Shadcn Zinc)</strong></td>
                            <td>Menekan tombol switch tema di sidebar navigasi.</td>
                            <td>Seluruh komponen antarmuka berganti warna tema secara instan berstandar kontras tinggi (Zinc-950 vs Zinc-50) tanpa glitch tampilan.</td>
                            <td><span class="status-badge-ok">&#10003; 100% Lolos</span></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><strong>Ketahanan Koneksi SQL Server</strong></td>
                            <td>Menguji aplikasi saat database belum dibuat atau koneksi LocalDB belum aktif.</td>
                            <td>Sistem menangani exception secara elegan dengan dialog error terstruktur dan tidak mengalami crash (*fail-safe handling*).</td>
                            <td><span class="status-badge-ok">&#10003; 100% Lolos</span></td>
                        </tr>
                    </tbody>
                </table>

                <hr style="margin:35px 0;">

                <h2>8. Jawaban Resmi Soal Penugasan ETS &amp; Poster Infografis Aplikasi</h2>
                <p>
                    Bagian ini menyajikan secara eksplisit jawaban atas <strong>3 butir soal penugasan resmi Evaluasi Tengah Semester (ETS) PBKK</strong>, dilengkapi dengan <strong>Poster Infografis 1 Halaman</strong> yang merangkum keseluruhan konsep, arsitektur, dan fitur aplikasi:
                </p>

                <!-- Box Soal ETS PBKK -->
                <div class="milestone-card" style="margin:20px 0 25px 0; border-left: 5px solid var(--pbkk-color); background:linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(99, 102, 241, 0.03));">
                    <div class="milestone-header" style="margin-bottom:12px;">
                        <h3 style="margin:0; font-size:1.1rem; color:var(--text-heading); display:flex; align-items:center; gap:8px;">
                            <span>📝</span> Butir Soal Penugasan ETS PBKK (Kelas D)
                        </h3>
                        <span class="badge-pill badge-tech">3 Butir Penugasan</span>
                    </div>
                    <ol style="margin:0; padding-left:22px; font-size:0.92rem; color:var(--text-color); line-height:1.65;">
                        <li><strong>Soal 1:</strong> Jelaskan deskripsi dan ruang lingkup fitur aplikasi Desktop Rich UI yang dibuat.</li>
                        <li><strong>Soal 2:</strong> Apa latar belakang dan Manfaat aplikasi tersebut dibuat.</li>
                        <li><strong>Soal 3:</strong> Buat Poster Infografis aplikasi yang telah dibuat dalam 1 halaman.</li>
                    </ol>
                </div>

                <!-- Grid Jawaban Soal 1 & Soal 2 -->
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap:20px; margin:25px 0;">
                    <!-- Card Jawaban Soal 1 -->
                    <div class="deliverable-box" style="margin:0; border-left: 4px solid #2563eb;">
                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                            <span class="badge-pill badge-must" style="font-size:0.75rem;">Jawaban Soal 1</span>
                            <h4 style="margin:0; font-size:1.05rem; color:var(--text-heading);">Deskripsi &amp; Ruang Lingkup Fitur Desktop Rich UI</h4>
                        </div>
                        <p style="font-size:0.88rem; line-height:1.55; color:var(--text-color); margin-bottom:12px;">
                            <strong>SkillForge</strong> adalah aplikasi desktop <em>Rich UI</em> berbasis <strong>.NET 8 WPF (Windows Presentation Foundation)</strong> yang dirancang dengan pola arsitektur <strong>MVVM murni</strong> (CommunityToolkit.Mvvm) dan terintegrasi secara relasional ke basis data <strong>Microsoft SQL Server</strong>. Aplikasi ini bertindak sebagai hub digital cerdas bagi mahasiswa rumpun informatika untuk menginventarisasi rekam jejak karya perkuliahan serta menguji kesiapannya menghadapi bursa magang industri.
                        </p>
                        <strong style="font-size:0.86rem; color:var(--text-heading); display:block; margin-bottom:6px;">Ruang Lingkup Fitur Utama Sistem:</strong>
                        <ul style="font-size:0.84rem; color:var(--text-color); padding-left:18px; margin:0; line-height:1.6;">
                            <li><strong>Dashboard Analitik:</strong> Agregasi 4 kartu metrik KPI (Total Proyek, Total Skill Terbukti, Skor Tertinggi, Target Aktif) dan rekomendasi magang prioritas.</li>
                            <li><strong>Manajemen Portofolio Proyek (CRUD):</strong> Pencatatan karya dengan relasi Many-to-Many ke tag keahlian, pencarian instan reaktif, dan sanitasi form input.</li>
                            <li><strong>Ekspor Portofolio (.md):</strong> Fitur kompilasi rekam jejak tugas besar mahasiswa langsung menjadi berkas Markdown siap cetak di Desktop.</li>
                            <li><strong>Mesin Asesmen Kesiapan (Readiness Engine):</strong> Perhitungan skor matematis terukur (0–100%) membandingkan bobot syarat peran industri vs bukti portofolio.</li>
                            <li><strong>Pelacak Lamaran (Pipeline Kanban):</strong> Papan Kanban 4 tahapan alur lamaran (<em>Wishlist, Terkirim, Wawancara, Diterima</em>).</li>
                            <li><strong>Desain Modern Shadcn Zinc:</strong> Transisi instan Mode Gelap/Terang (DynamicResource) dengan 100% ikon vektor Path Geometri bebas emoji.</li>
                        </ul>
                    </div>

                    <!-- Card Jawaban Soal 2 -->
                    <div class="deliverable-box" style="margin:0; border-left: 4px solid #10b981;">
                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                            <span class="badge-pill badge-should" style="font-size:0.75rem;">Jawaban Soal 2</span>
                            <h4 style="margin:0; font-size:1.05rem; color:var(--text-heading);">Latar Belakang &amp; Manfaat Pembuatan Aplikasi</h4>
                        </div>
                        <p style="font-size:0.88rem; line-height:1.55; color:var(--text-color); margin-bottom:12px;">
                            <strong>Latar Belakang:</strong> Selama masa perkuliahan, mahasiswa teknik informatika menghasilkan banyak artefak proyek tugas besar dan tugas akhir. Namun, karya-karya ini umumnya <em>terfragmentasi</em> di berbagai folder lokal tanpa dokumentasi yang terstruktur. Selain itu, mahasiswa kerap mengalami <em>Skill Gap Blindness</em> saat melamar magang—mereka tidak mengetahui secara pasti apakah portofolio mereka telah memenuhi standar teknis industri. CV konvensional juga minim pembuktian autentik.
                        </p>
                        <strong style="font-size:0.86rem; color:var(--text-heading); display:block; margin-bottom:6px;">Manfaat Nyata Aplikasi:</strong>
                        <ul style="font-size:0.84rem; color:var(--text-color); padding-left:18px; margin:0; line-height:1.6;">
                            <li><strong>Bagi Mahasiswa:</strong> Memiliki portofolio digital terpusat yang terbukti dengan bukti repositori GitHub, serta mendapatkan evaluasi objektif mengenai kekurangan keahlian (gap skill) sebelum melamar magang.</li>
                            <li><strong>Bagi Mentor / Reviewer Kampus:</strong> Menyediakan sarana pemantauan kapabilitas mahasiswa secara transparan berbasis bukti riil proyek akademik.</li>
                            <li><strong>Bagi Mitra Industri:</strong> Mempermudah verifikasi kompetensi kandidat magang secara terukur tanpa sekadar bergantung pada klaim tekstual di resume.</li>
                            <li><strong>Efisiensi Waktu:</strong> Menghilangkan proses kurasi manual melalui otomasi ekspor portofolio dan pelacak status lamaran magang.</li>
                        </ul>
                    </div>
                </div>

                <!-- Card Jawaban Soal 3: Poster Infografis 1 Halaman -->
                <div class="deliverable-box" style="margin:25px 0; border-left: 4px solid var(--pbkk-color);">
                    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:16px;">
                        <div>
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                <span class="badge-pill badge-success" style="font-size:0.75rem;">Jawaban Soal 3</span>
                                <h3 style="margin:0; color:var(--text-heading); font-size:1.2rem;">
                                    🎨 Poster Infografis Aplikasi SkillForge (1 Halaman)
                                </h3>
                            </div>
                            <p style="margin:0; font-size:0.88rem; color:var(--text-muted);">
                                Poster infografis visual beresolusi tinggi (1 Halaman Penuh) yang merangkum latar belakang, arsitektur solusi, alur kerja, dan keunggulan Rich UI SkillForge:
                            </p>
                        </div>
                        <div style="display:flex; gap:10px; flex-wrap:wrap;">
                            <a href="Infografis-SkillForge.png" target="_blank" class="btn-action btn-preview-primary" style="font-size:0.85rem; padding:8px 16px;">
                                <span>🔍</span> Buka Ukuran Penuh (HD)
                            </a>
                            <a href="Infografis-SkillForge.png" download="Infografis-SkillForge.png" class="btn-action btn-preview-secondary" style="font-size:0.85rem; padding:8px 16px;">
                                <span>📥</span> Unduh Poster PNG (2.0 MB)
                            </a>
                        </div>
                    </div>

                    <!-- Frame Tampilan Poster Infografis -->
                    <div style="background:var(--bg-color); border:1.5px solid rgba(124, 58, 237, 0.25); border-radius:12px; padding:18px; box-shadow:var(--shadow-raised-sm); text-align:center;">
                        <a href="Infografis-SkillForge.png" target="_blank" title="Klik untuk membuka dan memperbesar poster infografis dalam ukuran penuh">
                            <img src="Infografis-SkillForge.png" alt="Poster Infografis SkillForge - Student Portfolio &amp; Internship Readiness System" 
                                 style="width:100%; max-width:980px; height:auto; border-radius:8px; box-shadow:0 10px 30px rgba(0,0,0,0.15); display:inline-block; transition:transform 0.2s ease; cursor:pointer;"
                                 onmouseover="this.style.transform='scale(1.008)'" onmouseout="this.style.transform='scale(1)'">
                        </a>
                        <div style="margin-top:16px; padding-top:12px; border-top:1px solid rgba(163,177,198,0.3); display:flex; justify-content:center; align-items:center; gap:18px; font-size:0.85rem; color:var(--text-muted); flex-wrap:wrap;">
                            <span><strong>Nama Berkas:</strong> <code>Infografis-SkillForge.png</code></span>
                            <span>&bull;</span>
                            <span><strong>Ukuran File:</strong> ~2.0 MB (High Definition)</span>
                            <span>&bull;</span>
                            <span><strong>Format:</strong> 1 Halaman Vertikal</span>
                            <span>&bull;</span>
                            <span><strong>Penyusun:</strong> Kelompok 10 (Farrel Prastita Ramadhan &amp; Ageng Prayogo)</span>
                        </div>
                    </div>
                </div>

                <hr style="margin:35px 0;">

                <h3>Rincian Implementasi UI/UX Modern (Tema Shadcn Zinc &bull; Zero AI Slop)</h3>
                <p>
                    Sebagai komitmen menghadirkan kualitas perangkat lunak berstandar industri dan mengeliminasi visual <em>AI slop</em> (ikon emoji generik), antarmuka aplikasi SkillForge diimplementasikan secara penuh menggunakan <strong>100% XAML Vector Path Geometries (Lucide-inspired)</strong> dengan filosofi desain <strong>Shadcn Zinc</strong>:
                </p>

                <div class="code-summary-grid">
                    <div class="screenshot-placeholder-box" style="border:1px solid rgba(16,185,129,0.3); background:var(--card-bg);">
                        <div style="font-size:2.4rem; margin-bottom:8px;">📊</div>
                        <h4>1. Dashboard Analitik &amp; Rekomendasi</h4>
                        <p>Menampilkan 4 kartu KPI metrik portofolio bergaris 1px, rekomendasi lowongan prioritas dengan match score, serta tabel karya proyek terbaru.</p>
                        <div style="margin-top:12px;">
                            <span class="badge-pill badge-tech">4 KPI Cards</span>
                            <span class="badge-pill badge-success">Selesai</span>
                        </div>
                    </div>

                    <div class="screenshot-placeholder-box" style="border:1px solid rgba(59,130,246,0.3); background:var(--card-bg);">
                        <div style="font-size:2.4rem; margin-bottom:8px;">📁</div>
                        <h4>2. Manajemen Portofolio &amp; Ekspor</h4>
                        <p>Katalog portofolio terhubung SQL Server dengan pencarian real-time, dialog modal tambah proyek (relasi N-to-M), serta ekspor ringkasan portofolio ke format Markdown.</p>
                        <div style="margin-top:12px;">
                            <span class="badge-pill badge-tech">CRUD + .md Export</span>
                            <span class="badge-pill badge-success">Selesai</span>
                        </div>
                    </div>

                    <div class="screenshot-placeholder-box" style="border:1px solid rgba(245,158,11,0.3); background:var(--card-bg);">
                        <div style="font-size:2.4rem; margin-bottom:8px;">🎯</div>
                        <h4>3. Mesin Asesmen Kesiapan Magang</h4>
                        <p>Engine asesmen kesiapan berbasis bobot persyaratan industri, visualisasi persentase kecocokan <em>Job Ready</em>, serta rincian analisis gap keahlian.</p>
                        <div style="margin-top:12px;">
                            <span class="badge-pill badge-tech">Readiness Engine</span>
                            <span class="badge-pill badge-success">Selesai</span>
                        </div>
                    </div>

                    <div class="screenshot-placeholder-box" style="border:1px solid rgba(139,92,246,0.3); background:var(--card-bg);">
                        <div style="font-size:2.4rem; margin-bottom:8px;">📌</div>
                        <h4>4. Pelacak Lamaran (Pipeline Kanban)</h4>
                        <p>Papan Kanban 4 tahapan pelacakan aplikasi magang (*Wishlist*, *Terkirim*, *Wawancara*, dan *Diterima*) dengan header berikon vektor dan badge counter.</p>
                        <div style="margin-top:12px;">
                            <span class="badge-pill badge-tech">Kanban Board</span>
                            <span class="badge-pill badge-success">Selesai</span>
                        </div>
                    </div>

                    <div class="screenshot-placeholder-box" style="border:1px solid rgba(100,116,139,0.3); background:var(--card-bg);">
                        <div style="font-size:2.4rem; margin-bottom:8px;">🌓</div>
                        <h4>5. Dark Mode &amp; Light Mode Shadcn</h4>
                        <p>Sistem token warna dinamis terpusat (Zinc-950 vs Zinc-50) berstandar aksesibilitas tinggi dan 100% bebas dari emoji/elemen norak.</p>
                        <div style="margin-top:12px;">
                            <span class="badge-pill badge-tech">Dynamic Tokens</span>
                            <span class="badge-pill badge-success">Selesai</span>
                        </div>
                    </div>

                    <div class="screenshot-placeholder-box" style="border:1px solid rgba(239,68,68,0.3); background:var(--card-bg);">
                        <div style="font-size:2.4rem; margin-bottom:8px;">⚡</div>
                        <h4>6. 100% Vector Geometries (No AI Slop)</h4>
                        <p>Seluruh ikon antarmuka dirender menggunakan XAML Path Geometries murni (Lucide icons), menjamin ketajaman visual di semua resolusi dan DPI layar.</p>
                        <div style="margin-top:12px;">
                            <span class="badge-pill badge-tech">SVG Vector Paths</span>
                            <span class="badge-pill badge-success">Selesai</span>
                        </div>
                    </div>
                </div>

                <!-- Video Demo & Tautan Eksekusi Box -->
                <div class="qa-box" style="margin-top:30px;">
                    <h4 style="display:flex; align-items:center; gap:8px;">
                        <span>🎬</span> Dokumentasi Demo &amp; Pengujian Aplikasi ETS
                    </h4>
                    <p>
                        Seluruh alur fungsionalitas (Inisialisasi SQL Server LocalDB &rarr; Navigasi Dashboard Shadcn &rarr; Input Karya Portofolio N-to-M &rarr; Ekspor Portofolio ke Markdown &rarr; Asesmen Kesiapan Magang Real-Time &rarr; Toggle Dark/Light Mode) telah berhasil diuji dan berfungsi sempurna:
                    </p>
                    <div style="background:var(--bg-color); padding:20px; border-radius:8px; box-shadow:var(--shadow-inset); text-align:center; margin-top:12px;">
                        <span style="font-size:1.8rem;">🖥️</span>
                        <p style="margin:6px 0 0 0; font-size:0.95rem; font-weight:600; color:var(--text-heading);">
                            Aplikasi SkillForge .NET 8 WPF Siap Dijalankan dari Folder <code>demo/</code>
                        </p>
                        <p style="margin:4px 0 12px 0; font-size:0.85rem; color:var(--text-muted);">
                            Dapat dieksekusi secara instan via terminal <code>dotnet run --project SkillForge\SkillForge.csproj</code> ataupun melalui Visual Studio.
                        </p>
                        <a href="demo/" target="_blank" class="btn-action btn-preview-primary" style="font-size:0.88rem; padding:8px 18px; display:inline-flex; align-items:center; gap:6px;">
                            <span>📂</span> Jelajahi Berkas Proyek di Direktori demo/
                        </a>
                    </div>
                </div>
            </div></div></div>

        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Farrel Prastita Ramadhan</strong> (5025241219) &amp; <strong>Ageng Prayogo</strong> (5025241225) &bull; Kelompok 10 &bull; Evaluasi Tengah Semester (ETS) PBKK &bull; <a href="../">Kembali ke Portal Tugas PBKK</a></p>
        </footer>
    </div>

    <!-- Script Interaktif untuk Navigasi Tab, Toggle PDF, Copy Code, dan Simulator Kesiapan -->
    <script>
    // --- 1. Tab Navigasi Switcher ---
    function switchTab(tabId, btnElement) {
        const panels = document.querySelectorAll('.tab-content-panel');
        panels.forEach(panel => {
            panel.style.display = 'none';
        });

        const activePanel = document.getElementById(tabId);
        if (activePanel) {
            activePanel.style.display = 'block';
        }

        const buttons = document.querySelectorAll('.tab-btn');
        buttons.forEach(btn => btn.classList.remove('active'));
        if (btnElement) {
            btnElement.classList.add('active');
        }
    }

    function showAllTabs(btnElement) {
        const panels = document.querySelectorAll('.tab-content-panel');
        panels.forEach(panel => {
            panel.style.display = 'block';
        });

        const buttons = document.querySelectorAll('.tab-btn');
        buttons.forEach(btn => btn.classList.remove('active'));
        if (btnElement) {
            btnElement.classList.add('active');
        }
    }

    // --- 2. Toggle PDF Viewer ---
    function togglePdfViewer() {
        const viewerCard = document.getElementById('pdfViewerCard');
        const btnToggle = document.getElementById('btnTogglePreview');
        if (viewerCard.style.display === 'block') {
            viewerCard.style.display = 'none';
            btnToggle.innerHTML = '<span>👁️</span> Pratinjau Dokumen';
        } else {
            viewerCard.style.display = 'block';
            btnToggle.innerHTML = '<span>✕</span> Tutup Pratinjau';
            viewerCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // --- 3. Salin Kode SQL ---
    function copySqlCode(button) {
        const snippet = document.getElementById('sqlSnippet').innerText;
        navigator.clipboard.writeText(snippet).then(function() {
            const originalText = button.innerText;
            button.innerText = 'Tersalin!';
            setTimeout(function() {
                button.innerText = originalText;
            }, 2000);
        }).catch(function() {
            button.innerText = 'Gagal';
        });
    }

    // --- 4. Simulator Interaktif Logika Kesiapan Magang ---
    const roleDatasets = {
        software_engineer: {
            title: "Software Engineer Intern",
            requirements: [
                { id: "csharp", name: "C# Programming", weight: 3.0, type: "Wajib" },
                { id: "wpf", name: ".NET 8 / WPF Architecture", weight: 3.0, type: "Wajib" },
                { id: "sql", name: "SQL Server (ADO.NET & Transactions)", weight: 3.0, type: "Wajib" },
                { id: "git", name: "Git Version Control", weight: 2.0, type: "Disarankan" },
                { id: "patterns", name: "Design Patterns (MVVM / Repository)", weight: 2.0, type: "Disarankan" },
                { id: "unit_test", name: "Unit Testing Basics", weight: 1.0, type: "Opsional" }
            ]
        },
        fullstack_intern: {
            title: "Full-Stack Engineer Intern",
            requirements: [
                { id: "react", name: "Frontend: React / JavaScript", weight: 3.0, type: "Wajib" },
                { id: "aspnet", name: "Backend: ASP.NET Core Web API", weight: 3.0, type: "Wajib" },
                { id: "sql", name: "Database: SQL Server / PostgreSQL", weight: 3.0, type: "Wajib" },
                { id: "docker", name: "DevOps: Docker Containerization", weight: 2.0, type: "Disarankan" },
                { id: "git", name: "Git Version Control", weight: 2.0, type: "Disarankan" },
                { id: "rest", name: "RESTful API Architecture", weight: 2.0, type: "Disarankan" }
            ]
        },
        data_analyst: {
            title: "Data Analyst Intern",
            requirements: [
                { id: "python", name: "Python (Pandas, NumPy)", weight: 3.0, type: "Wajib" },
                { id: "sql_analytics", name: "Advanced SQL (Aggregations, Window Functions)", weight: 3.0, type: "Wajib" },
                { id: "bi_tools", name: "Data Visualization (PowerBI / Tableau)", weight: 2.0, type: "Disarankan" },
                { id: "excel", name: "Advanced Spreadsheet & Pivot", weight: 2.0, type: "Disarankan" },
                { id: "statistics", name: "Applied Statistics", weight: 2.0, type: "Disarankan" }
            ]
        }
    };

    function renderSkillCheckboxes() {
        const selectedRoleKey = document.getElementById('roleSelector').value;
        const roleData = roleDatasets[selectedRoleKey];
        const container = document.getElementById('skillsCheckboxContainer');
        container.innerHTML = '';

        roleData.requirements.forEach(req => {
            const label = document.createElement('label');
            label.className = 'sim-checkbox-label';

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.value = req.id;
            checkbox.dataset.weight = req.weight;
            checkbox.dataset.type = req.type;
            checkbox.onchange = calculateScore;

            // Beri centang bawaan untuk skill dasar agar interaktif
            if (req.type === 'Wajib' && (req.id === 'csharp' || req.id === 'react' || req.id === 'python')) {
                checkbox.checked = true;
            }

            const badgeColor = req.type === 'Wajib' ? '#dc2626' : (req.type === 'Disarankan' ? '#d97706' : '#2563eb');
            label.appendChild(checkbox);
            label.innerHTML += `<span><strong>${req.name}</strong> <small style="color:${badgeColor}; font-weight:700;">[${req.type} &bull; ${req.weight} pt]</small></span>`;
            
            // Re-assign onchange because innerHTML clears event listeners
            const input = label.querySelector('input');
            input.checked = checkbox.checked;
            input.onchange = calculateScore;

            container.appendChild(label);
        });

        calculateScore();
    }

    function calculateScore() {
        const selectedRoleKey = document.getElementById('roleSelector').value;
        const roleData = roleDatasets[selectedRoleKey];
        const container = document.getElementById('skillsCheckboxContainer');
        const checkboxes = container.querySelectorAll('input[type="checkbox"]');

        let totalRoleWeight = 0;
        let earnedWeight = 0;
        let missingMandatoryCount = 0;
        let matchedCount = 0;

        roleData.requirements.forEach(req => {
            totalRoleWeight += req.weight;
        });

        checkboxes.forEach((cb, idx) => {
            const req = roleData.requirements[idx];
            if (cb.checked) {
                earnedWeight += req.weight;
                matchedCount++;
            } else {
                if (req.type === 'Wajib') {
                    missingMandatoryCount++;
                }
            }
        });

        const scorePercentage = totalRoleWeight > 0 ? (earnedWeight / totalRoleWeight) * 100 : 0;
        const scoreFormatted = scorePercentage.toFixed(1) + '%';

        const scoreDisplay = document.getElementById('simScoreText');
        const badge = document.getElementById('simStatusBadge');
        const detailText = document.getElementById('simDetailText');

        scoreDisplay.innerText = scoreFormatted;

        if (scorePercentage >= 80 && missingMandatoryCount === 0) {
            badge.innerText = '🟢 Job Ready (Siap Melamar)';
            badge.className = 'sim-status-badge badge-success';
            detailText.innerHTML = `Luar biasa! Seluruh keahlian Wajib terpenuhi dan skor total mencapai <strong>${scoreFormatted}</strong>. Memenuhi standar kualifikasi industri.`;
        } else if (scorePercentage >= 50) {
            badge.innerText = '🟡 Needs Improvement (Perlu Penguatan)';
            badge.className = 'sim-status-badge badge-should';
            detailText.innerHTML = `Memperoleh <strong>${earnedWeight}</strong> dari <strong>${totalRoleWeight}</strong> poin. Terdapat <strong>${missingMandatoryCount}</strong> keahlian wajib yang belum terpenuhi.`;
        } else {
            badge.innerText = '🔴 Underqualified (Belum Memenuhi Syarat)';
            badge.className = 'sim-status-badge badge-must';
            detailText.innerHTML = `Skor saat ini <strong>${scoreFormatted}</strong>. Direkomendasikan menambah portofolio proyek untuk membuktikan keahlian wajib.`;
        }
    }

    function updateSimulation() {
        renderSkillCheckboxes();
    }

    // Inisialisasi awal saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        renderSkillCheckboxes();
    });
    </script>
</body>
</html>
