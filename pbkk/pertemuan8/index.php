<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: Profil Mahasiswa Statis (CodeIgniter 4) - PBKK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css?v=<?= time() ?>">
    <style>
        .badge-subject {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.82rem;
            font-weight: 600;
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            margin-bottom: 15px;
        }
        .github-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.04), rgba(124, 58, 237, 0.06));
            border: 1px solid rgba(124, 58, 237, 0.25);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            margin: 20px 0 25px;
        }
        .github-box-info strong {
            display: block;
            color: var(--text-heading);
            font-size: 0.96rem;
        }
        .github-box-info span {
            font-size: 0.86rem;
            color: var(--text-muted);
            word-break: break-all;
        }
        .btn-github {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 10px;
            background: #1e293b;
            color: #ffffff !important;
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            transition: var(--transition);
        }
        .btn-github:hover {
            background: var(--pbkk-color);
            transform: translateY(-2px);
        }
        .code-summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }
        .code-summary-box {
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-raised-sm);
        }
        .code-summary-box h4 {
            margin: 0 0 8px 0;
            color: var(--text-heading);
            font-size: 1.05rem;
        }
        .code-summary-box p {
            margin: 0;
            font-size: 0.92rem;
            line-height: 1.6;
            color: var(--text-muted);
        }
        .terminal-box {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 16px 20px;
            border-radius: 10px;
            font-family: 'Consolas', 'Courier New', monospace;
            font-size: 0.92rem;
            margin: 15px 0;
            border-left: 4px solid var(--pbkk-color);
            overflow-x: auto;
        }
        .terminal-box span.prompt {
            color: #4ec9b0;
        }
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
        }
        .test-table th {
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            font-weight: 700;
        }
        .status-badge-ok {
            background: rgba(16, 185, 129, 0.15);
            color: #059669;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 700;
        }
        .qa-box {
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            margin-bottom: 20px;
        }
        .qa-box h4 {
            margin: 0 0 8px 0;
            color: var(--text-heading);
            font-size: 1rem;
        }
        .qa-box p {
            margin: 0;
            font-size: 0.93rem;
            color: var(--text-muted);
            line-height: 1.6;
        }
        .screenshot-frame {
            background-color: var(--bg-color);
            padding: 18px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            text-align: center;
            margin: 20px 0;
        }
        .screenshot-frame img {
            margin: 0;
            border-radius: 10px;
            border: 1px solid rgba(148, 163, 184, 0.35);
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="../" class="tombol-kembali">&larr; Kembali ke Daftar Tugas PBKK</a>

        <div class="konten-tugas">
            <span class="badge-subject">🔥 Pertemuan 8 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>Halaman Profil Data Diri Statis dengan Framework CodeIgniter 4</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Jurusan:</strong> Teknik Informatika &bull; 
                <strong>Angkatan / Semester:</strong> 2024 / Semester 5 &bull; 
                <strong>Framework:</strong> CodeIgniter 4.7.6 (PHP 8.5)
            </div>

            <div class="github-box">
                <div class="github-box-info">
                    <strong>📦 Repositori GitHub Source Code</strong>
                    <span>https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan8/demo</span>
                </div>
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    <a href="demo/public/" class="btn-github" style="background: var(--pbkk-color);">🚀 Buka Demo CI4</a>
                    <a href="https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan8/demo" target="_blank" rel="noopener noreferrer" class="btn-github">🔗 Lihat di GitHub &rarr;</a>
                </div>
            </div>

            <hr>

            <!-- 1. Ringkasan Tugas -->
            <h2>1. Tujuan &amp; Ringkasan Tugas</h2>
            <p>
                Pada Pertemuan 8 mata kuliah <strong>Pemrograman Berbasis Kerangka Kerja (PBKK)</strong>, diperkenalkan framework PHP modern <strong>CodeIgniter 4 (CI4)</strong> dengan arsitektur <strong>MVC (Model-View-Controller)</strong>. Tugas pada pertemuan ini adalah membuat halaman web <strong>Data Diri / Profil Mahasiswa</strong> yang simpel, statis (tanpa koneksi database), dan diposisikan tepat di tengah layar (<em>centered card layout</em>).
            </p>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>🧭 Routing &amp; Controller</h4>
                    <p>Mengatur rute <code>/</code> dan <code>/profil</code> pada <code>app/Config/Routes.php</code> untuk diarahkan ke controller <code>Profil::index()</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>📄 Data Statis (Tanpa DB)</h4>
                    <p>Data mahasiswa (Nama, NRP, Jurusan Teknik Informatika, Angkatan 2024, dan Semester 5) dikirim sebagai array asosiatif dari controller ke view.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🎯 Centered Card UI</h4>
                    <p>Menggunakan CSS Flexbox (<code>min-height: 100vh; align-items: center; justify-content: center;</code>) agar kartu biodata tampil rapi tepat di tengah layar.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Cara Menjalankan -->
            <h2>2. Cara Menjalankan Aplikasi CodeIgniter 4</h2>
            <p>Aplikasi dapat dijalankan menggunakan built-in development server milik CodeIgniter 4 (<code>spark serve</code>):</p>

            <div class="terminal-box">
                <span class="prompt"># 1. Masuk ke folder project CodeIgniter 4 Pertemuan 8:</span><br>
                cd pbkk/pertemuan8/demo<br><br>
                <span class="prompt"># 2. Jalankan server development CodeIgniter 4:</span><br>
                php spark serve<br><br>
                <span class="prompt"># 3. Buka di browser:</span><br>
                http://localhost:8080/
            </div>

            <hr>

            <!-- 3. Source Code Lengkap -->
            <h2>3. Source Code Lengkap</h2>

            <h3>A. Routing: <code>app/Config/Routes.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeRoutes8')">Copy Code</button>
                <pre><code id="codeRoutes8">&lt;?php

use App\Controllers\Profil;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes-&gt;get('/', [Profil::class, 'index']);
$routes-&gt;get('profil', [Profil::class, 'index']);</code></pre>
            </div>

            <h3>B. Controller: <code>app/Controllers/Profil.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeCtrl8')">Copy Code</button>
                <pre><code id="codeCtrl8">&lt;?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'    =&gt; 'Profil Mahasiswa - Ageng Prayogo',
            'nama'     =&gt; 'Ageng Prayogo',
            'nrp'      =&gt; '5025241225',
            'jurusan'  =&gt; 'Teknik Informatika',
            'angkatan' =&gt; '2024',
            'semester' =&gt; 'Semester 5',
            'status'   =&gt; 'Mahasiswa Aktif',
        ];

        return view('profil_view', $data);
    }
}</code></pre>
            </div>

            <h3>C. View: <code>app/Views/profil_view.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeView8')">Copy Code</button>
                <pre><code id="codeView8">&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;&lt;?= esc($title) ?&gt;&lt;/title&gt;
    &lt;link rel="preconnect" href="https://fonts.googleapis.com"&gt;
    &lt;link rel="preconnect" href="https://fonts.gstatic.com" crossorigin&gt;
    &lt;link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet"&gt;
    &lt;style&gt;
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 50%, #f3e8ff 100%);
            color: #1e293b;
        }
        .profile-card {
            width: 100%;
            max-width: 440px;
            background: #ffffff;
            border-radius: 24px;
            padding: 38px 32px 30px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08), 0 4px 12px rgba(124, 58, 237, 0.06);
            border: 1px solid rgba(226, 232, 240, 0.9);
            text-align: center;
        }
        .avatar-wrapper {
            width: 112px;
            height: 112px;
            margin: 0 auto 18px;
            padding: 4px;
            border-radius: 50%;
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            box-shadow: 0 10px 24px rgba(124, 58, 237, 0.22);
        }
        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            background: #ffffff;
        }
        .badge-semester {
            display: inline-block;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 600;
            background: rgba(124, 58, 237, 0.1);
            color: #6d28d9;
            margin-bottom: 12px;
        }
        .profile-name { font-size: 1.55rem; font-weight: 700; color: #0f172a; margin-bottom: 4px; }
        .profile-nrp { font-size: 0.95rem; font-weight: 500; color: #64748b; margin-bottom: 24px; }
        .info-list {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 8px 18px;
            text-align: left;
            margin-bottom: 22px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
            gap: 12px;
        }
        .info-row:last-child { border-bottom: none; }
        .info-label { font-size: 0.86rem; color: #64748b; font-weight: 500; }
        .info-value { font-size: 0.92rem; color: #0f172a; font-weight: 600; text-align: right; }
        .card-footer { font-size: 0.78rem; color: #94a3b8; }
        .card-footer span { color: #6d28d9; font-weight: 600; }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;

    &lt;main class="profile-card"&gt;
        &lt;div class="avatar-wrapper"&gt;
            &lt;img src="&lt;?= base_url('images/avatar.jpg') ?&gt;"
                 alt="Foto Profil &lt;?= esc($nama) ?&gt;"
                 class="avatar-img"
                 onerror="this.src='images/avatar.jpg'; this.onerror=function(){this.style.display='none';};"&gt;
        &lt;/div&gt;

        &lt;span class="badge-semester"&gt;&lt;?= esc($status) ?&gt; &amp;bull; &lt;?= esc($semester) ?&gt;&lt;/span&gt;

        &lt;h1 class="profile-name"&gt;&lt;?= esc($nama) ?&gt;&lt;/h1&gt;
        &lt;p class="profile-nrp"&gt;NRP &lt;?= esc($nrp) ?&gt;&lt;/p&gt;

        &lt;section class="info-list" aria-label="Biodata Mahasiswa"&gt;
            &lt;div class="info-row"&gt;
                &lt;span class="info-label"&gt;Nama Lengkap&lt;/span&gt;
                &lt;span class="info-value"&gt;&lt;?= esc($nama) ?&gt;&lt;/span&gt;
            &lt;/div&gt;
            &lt;div class="info-row"&gt;
                &lt;span class="info-label"&gt;NRP&lt;/span&gt;
                &lt;span class="info-value"&gt;&lt;?= esc($nrp) ?&gt;&lt;/span&gt;
            &lt;/div&gt;
            &lt;div class="info-row"&gt;
                &lt;span class="info-label"&gt;Jurusan&lt;/span&gt;
                &lt;span class="info-value"&gt;&lt;?= esc($jurusan) ?&gt;&lt;/span&gt;
            &lt;/div&gt;
            &lt;div class="info-row"&gt;
                &lt;span class="info-label"&gt;Angkatan&lt;/span&gt;
                &lt;span class="info-value"&gt;&lt;?= esc($angkatan) ?&gt;&lt;/span&gt;
            &lt;/div&gt;
            &lt;div class="info-row"&gt;
                &lt;span class="info-label"&gt;Semester Saat Ini&lt;/span&gt;
                &lt;span class="info-value"&gt;&lt;?= esc($semester) ?&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/section&gt;

        &lt;footer class="card-footer"&gt;
            Dibangun dengan &lt;span&gt;CodeIgniter 4&lt;/span&gt; &amp;bull; Data Statis (Tanpa Database)
        &lt;/footer&gt;
    &lt;/main&gt;

&lt;/body&gt;
&lt;/html&gt;</code></pre>
            </div>

            <hr>

            <!-- 4. Tabel Pengujian -->
            <h2>4. Tabel Pengujian Aplikasi</h2>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Skenario Pengujian</th>
                        <th>Endpoint / URL</th>
                        <th>Hasil yang Diharapkan</th>
                        <th style="width: 110px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Akses Halaman Utama Profil</td>
                        <td><code>GET /</code></td>
                        <td>Controller <code>Profil::index()</code> merender kartu biodata statis tepat di tengah layar.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Akses Route Alternatif</td>
                        <td><code>GET /profil</code></td>
                        <td>Menampilkan halaman profil mahasiswa yang sama tanpa ketergantungan database.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kelengkapan Data Biodata</td>
                        <td><code>GET /</code></td>
                        <td>Menampilkan Nama (<code>Ageng Prayogo</code>), NRP (<code>5025241225</code>), Jurusan (<code>Teknik Informatika</code>), Angkatan (<code>2024</code>), dan <code>Semester 5</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 5. Screenshot -->
            <h2>5. Tangkapan Layar Aplikasi (Screenshot)</h2>
            <p>Berikut adalah hasil tampilan halaman profil statis CodeIgniter 4 saat dijalankan melalui <code>php spark serve</code>:</p>

            <div id="screenshot-container">
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m8-ci4.png" alt="Profil Statis CodeIgniter 4 Ageng Prayogo" onclick="openModal(this)">
                    <p class="caption">Gambar 1: Tampilan kartu data diri statis berada di tengah halaman pada framework CodeIgniter 4.</p>
                </div>
            </div>

            <hr>

            <!-- 6. Q&A -->
            <h2>6. Pertanyaan Pemahaman Konsep CodeIgniter 4</h2>
            <div class="qa-box">
                <h4>Q1: Bagaimana alur eksekusi halaman statis pada arsitektur CodeIgniter 4?</h4>
                <p><strong>Jawaban:</strong> Permintaan HTTP masuk ke <code>public/index.php</code>, lalu dicocokkan oleh router (<code>app/Config/Routes.php</code>). Route <code>'/'</code> memanggil method <code>index()</code> pada controller <code>App\Controllers\Profil</code>, yang kemudian meneruskan array data statis ke view <code>app/Views/profil_view.php</code> menggunakan fungsi <code>view()</code>.</p>
            </div>
            <div class="qa-box">
                <h4>Q2: Apa fungsi helper <code>esc()</code> pada file view CodeIgniter 4?</h4>
                <p><strong>Jawaban:</strong> Fungsi <code>esc()</code> melakukan <em>HTML escaping</em> terhadap data yang dicetak ke tampilan untuk mencegah serangan <em>Cross-Site Scripting (XSS)</em>.</p>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 8 &bull; <a href="https://github.com/YOGA3321/tugas-pweb---pbo" target="_blank" rel="noopener noreferrer">GitHub Repository</a> &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
        </footer>
    </div>

    <!-- Modal Gambar Zoom -->
    <div id="myModal" class="modal" onclick="closeModal()">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
    function copyCode(button, elementId) {
        const codeElement = document.getElementById(elementId);
        navigator.clipboard.writeText(codeElement.innerText).then(function() {
            button.innerText = 'Copied!';
            setTimeout(function() { button.innerText = 'Copy Code'; }, 2000);
        }, function(err) {
            button.innerText = 'Gagal';
        });
    }

    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    function openModal(element) {
        modal.style.display = "block";
        modal.style.opacity = "1";
        modalImg.src = element.src;
    }

    function closeModal() {
        modal.style.opacity = "0";
        setTimeout(function() {
            modal.style.display = "none";
        }, 300);
    }
    </script>
</body>
</html>
