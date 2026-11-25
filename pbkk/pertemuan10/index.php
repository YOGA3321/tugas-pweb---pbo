<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: ShopEase Routing, Controller, View &amp; Landing Page (CI4) - PBKK</title>
    
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
        .architecture-card {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(37, 99, 235, 0.05));
            border: 1px solid rgba(124, 58, 237, 0.2);
            border-radius: var(--radius-md);
            padding: 24px;
            margin: 25px 0;
        }
        .architecture-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        .architecture-step {
            background: var(--bg-color);
            padding: 15px;
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-raised-sm);
            border-left: 3px solid var(--pbkk-color);
        }
        .architecture-step strong {
            display: block;
            color: var(--text-heading);
            margin-bottom: 5px;
            font-size: 0.95rem;
        }
        .architecture-step span {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.4;
            display: block;
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
            <span class="badge-subject">🛒 Pertemuan 10 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>ShopEase Online Store: Setup CI4, Routing, Controller, View &amp; Landing Page</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Teknologi:</strong> CodeIgniter 4.7.6 (PHP 8.5), MariaDB 11.8 (Port 3305), Bootstrap 5 &bull; 
                <strong>Fokus Modul:</strong> Setup Environment, Database Awal, Routing, Controller, View Layouting &amp; Landing Page
            </div>

            <div class="github-box">
                <div class="github-box-info">
                    <strong>📦 Repositori GitHub Source Code</strong>
                    <span>https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan10/demo</span>
                </div>
                <a href="https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan10/demo" target="_blank" rel="noopener noreferrer" class="btn-github">🔗 Lihat di GitHub &rarr;</a>
            </div>

            <hr>

            <!-- 1. Pendahuluan -->
            <h2>1. Pendahuluan &amp; Ringkasan Praktikum</h2>
            <p>
                Pada Pertemuan 10, dimulai pengembangan proyek studi kasus <strong>ShopEase – Online Store</strong> menggunakan framework <strong>CodeIgniter 4</strong>. Fokus utama pada pertemuan ini adalah tahap fondasi aplikasi (<strong>Praktikum 1 s.d. 3</strong> pada dokumen <em>Hands-On Lab</em>), meliputi instalasi proyek CodeIgniter 4, konfigurasi file <code>.env</code> ke MariaDB (<code>db_shopease</code> port <code>3305</code>), perancangan routing, pembuatan Controller publik, serta penyusunan <strong>Landing Page / Homepage</strong> yang modern beserta halaman <em>Tentang Kami</em> dan <em>Kontak</em>.
            </p>

            <div class="architecture-card">
                <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem;">🏗️ Alur Request–Response MVC pada Landing Page</h3>
                <div class="architecture-grid">
                    <div class="architecture-step">
                        <strong>1. Browser Request</strong>
                        <span>Pengguna mengakses <code>/</code>, <code>/about</code>, atau <code>/contact</code> melalui browser.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>2. Routes.php</strong>
                        <span>Router mencocokkan URI ke method controller yang tepat (<code>HomeController::index</code>, dll).</span>
                    </div>
                    <div class="architecture-step">
                        <strong>3. Controller &amp; Model</strong>
                        <span><code>HomeController</code> mengambil kategori dan produk aktif dari MariaDB lalu mengirim ke view.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>4. View Layouting</strong>
                        <span>View mewarisi <code>layouts/main.php</code> (Navbar + Section Content + Footer) dan memakai <code>esc()</code>.</span>
                    </div>
                </div>
            </div>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>🎨 Desain Landing Page Modern</h4>
                    <p>Hero section gelap bergradasi dengan ringkasan etalase, strip keunggulan toko, kartu kategori berikon, grid katalog produk, dan banner CTA.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🧩 Template Layout Reusable</h4>
                    <p>Menggunakan <code>$this-&gt;extend('layouts/main')</code> dan <code>$this-&gt;include('partials/navbar')</code> sehingga navbar dan footer konsisten di semua halaman.</p>
                </div>
                <div class="code-summary-box">
                    <h4>✉️ Validasi Form Kontak + CSRF</h4>
                    <p>Halaman kontak memvalidasi nama, email, dan pesan di server dengan <code>csrf_field()</code> serta mengembalikan input lama (<code>old()</code>) bila gagal.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🗄️ Koneksi MariaDB Port 3305</h4>
                    <p>File <code>.env</code> dikonfigurasi ke database <code>db_shopease</code> pada MariaDB native Ubuntu di <code>127.0.0.1:3305</code>.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Cara Menjalankan -->
            <h2>2. Cara Menjalankan Aplikasi (.NET / PHP CLI)</h2>
            <div class="terminal-box">
                <span class="prompt"># 1. Import skema database awal ShopEase ke MariaDB (port 3305):</span><br>
                mysql -h 127.0.0.1 -P 3305 -u shopease -pshopease123 db_shopease &lt; pbkk/pertemuan10/demo/database_shopease.sql<br><br>
                <span class="prompt"># 2. Masuk ke direktori proyek dan jalankan server CodeIgniter 4:</span><br>
                cd pbkk/pertemuan10/demo<br>
                php spark serve --port 8090<br><br>
                <span class="prompt"># 3. Buka halaman landing page di browser:</span><br>
                http://localhost:8090/
            </div>

            <hr>

            <!-- 3. Source Code Lengkap -->
            <h2>3. Source Code Lengkap (Pertemuan 10 – Setup, Routing, Controller &amp; Landing Page)</h2>

            <h3>A. Konfigurasi Environment: <code>.env</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeEnv10')">Copy Code</button>
                <pre><code id="codeEnv10">CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8090/'
app.indexPage = ''

database.default.hostname = 127.0.0.1
database.default.database = db_shopease
database.default.username = shopease
database.default.password = shopease123
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3305</code></pre>
            </div>

            <h3>B. Routing Publik: <code>app/Config/Routes.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeRoutes10')">Copy Code</button>
                <pre><code id="codeRoutes10">&lt;?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes-&gt;get('/', 'HomeController::index', ['as' =&gt; 'home']);
$routes-&gt;get('about', 'AboutController::index', ['as' =&gt; 'about']);
$routes-&gt;get('contact', 'ContactController::index', ['as' =&gt; 'contact']);
$routes-&gt;post('contact/send', 'ContactController::send', ['as' =&gt; 'contact.send']);</code></pre>
            </div>

            <h3>C. Controllers Publik: <code>HomeController.php</code>, <code>AboutController.php</code> &amp; <code>ContactController.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeCtrl10')">Copy Code</button>
                <pre><code id="codeCtrl10">// ===== app/Controllers/HomeController.php =====
&lt;?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        $selectedSlug = $this-&gt;request-&gt;getGet('category');
        $categories   = $categoryModel-&gt;orderBy('id', 'ASC')-&gt;findAll();

        $builder = $productModel
            -&gt;select('products.*, categories.name AS category_name, categories.slug AS category_slug')
            -&gt;join('categories', 'categories.id = products.category_id')
            -&gt;where('products.status', 'active');

        if (! empty($selectedSlug)) {
            $builder-&gt;where('categories.slug', $selectedSlug);
        }

        $products = $builder-&gt;orderBy('products.id', 'DESC')-&gt;findAll();

        return view('frontend/home', [
            'title'        =&gt; 'ShopEase – Online Store',
            'active'       =&gt; 'home',
            'categories'   =&gt; $categories,
            'products'     =&gt; $products,
            'selectedSlug' =&gt; $selectedSlug,
        ]);
    }
}

// ===== app/Controllers/AboutController.php =====
&lt;?php

namespace App\Controllers;

class AboutController extends BaseController
{
    public function index(): string
    {
        return view('frontend/about', [
            'title'  =&gt; 'Tentang Kami – ShopEase',
            'active' =&gt; 'about',
        ]);
    }
}

// ===== app/Controllers/ContactController.php =====
&lt;?php

namespace App\Controllers;

class ContactController extends BaseController
{
    public function index(): string
    {
        return view('frontend/contact', [
            'title'  =&gt; 'Hubungi Kami – ShopEase',
            'active' =&gt; 'contact',
        ]);
    }

    public function send()
    {
        $rules = [
            'name'    =&gt; 'required|min_length[3]|max_length[100]',
            'email'   =&gt; 'required|valid_email',
            'message' =&gt; 'required|min_length[10]',
        ];

        $messages = [
            'name'    =&gt; ['required' =&gt; 'Nama wajib diisi.', 'min_length' =&gt; 'Nama minimal 3 karakter.'],
            'email'   =&gt; ['required' =&gt; 'Email wajib diisi.', 'valid_email' =&gt; 'Format email tidak valid.'],
            'message' =&gt; ['required' =&gt; 'Pesan wajib diisi.', 'min_length' =&gt; 'Pesan minimal 10 karakter.'],
        ];

        if (! $this-&gt;validate($rules, $messages)) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        $name = trim((string) $this-&gt;request-&gt;getPost('name'));
        return redirect()-&gt;to('/contact')-&gt;with('success', 'Terima kasih, ' . $name . '! Pesan Anda telah kami terima.');
    }
}</code></pre>
            </div>

            <h3>D. Layout &amp; Landing Page View: <code>layouts/main.php</code> &amp; <code>frontend/home.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeHome10')">Copy Code</button>
                <pre><code id="codeHome10">&lt;!-- app/Views/layouts/main.php --&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;&lt;?= esc($title ?? 'ShopEase Online Store') ?&gt;&lt;/title&gt;
    &lt;link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"&gt;
    &lt;link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"&gt;
    &lt;link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"&gt;
    &lt;link href="/css/shopease.css" rel="stylesheet"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;?= $this-&gt;include('partials/navbar') ?&gt;
    &lt;main class="storefront-main container py-4"&gt;
        &lt;?= $this-&gt;include('partials/alerts') ?&gt;
        &lt;?= $this-&gt;renderSection('content') ?&gt;
    &lt;/main&gt;
    &lt;?= $this-&gt;include('partials/footer') ?&gt;
    &lt;script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;

&lt;!-- app/Views/frontend/home.php (potongan utama Hero, Trust Strip, Kategori, Produk) --&gt;
&lt;?= $this-&gt;extend('layouts/main') ?&gt;
&lt;?= $this-&gt;section('content') ?&gt;

&lt;section class="se-hero mb-4"&gt;
    &lt;div class="row align-items-center g-4 position-relative" style="z-index: 2;"&gt;
        &lt;div class="col-lg-7"&gt;
            &lt;div class="se-hero-pill"&gt;&lt;i class="bi bi-stars text-warning"&gt;&lt;/i&gt; Koleksi Terbaru &amp;bull; Garansi Produk Original&lt;/div&gt;
            &lt;h1&gt;Belanja Lebih Mudah, &lt;span&gt;Pilihan Lengkap&lt;/span&gt; Setiap Hari.&lt;/h1&gt;
            &lt;p class="se-hero-lead mb-4"&gt;Temukan perangkat elektronik, fashion kasual, dan aksesoris berkualitas di ShopEase.&lt;/p&gt;
            &lt;div class="d-flex flex-wrap gap-2 mb-4"&gt;
                &lt;a href="#daftar-produk" class="btn btn-light fw-bold px-4 py-2 text-dark"&gt;Jelajahi Produk&lt;/a&gt;
                &lt;a href="/about" class="btn btn-outline-light fw-semibold px-4 py-2"&gt;Tentang ShopEase&lt;/a&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="col-lg-5"&gt;
            &lt;div class="se-hero-showcase"&gt;
                &lt;div class="row g-2 mb-3"&gt;
                    &lt;div class="col-6"&gt;&lt;div class="se-mini-metric"&gt;&lt;div class="small"&gt;Produk Aktif&lt;/div&gt;&lt;div class="fs-3 fw-bold text-white"&gt;&lt;?= count($products) ?&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;
                    &lt;div class="col-6"&gt;&lt;div class="se-mini-metric"&gt;&lt;div class="small"&gt;Kategori&lt;/div&gt;&lt;div class="fs-3 fw-bold text-white"&gt;&lt;?= count($categories) ?&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/section&gt;
...
&lt;?= $this-&gt;endSection() ?&gt;</code></pre>
            </div>

            <hr>

            <!-- 4. Tabel Pengujian -->
            <h2>4. Tabel Pengujian Halaman Publik &amp; Routing</h2>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Skenario Pengujian</th>
                        <th>Endpoint</th>
                        <th>Hasil yang Diharapkan</th>
                        <th style="width: 110px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Akses Halaman Beranda</td>
                        <td><code>GET /</code></td>
                        <td>Landing page ShopEase tampil lengkap (Hero, Trust Strip, Kategori, Produk Aktif, Footer) dengan HTTP 200.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Filter Kategori di Homepage</td>
                        <td><code>GET /?category=elektronik</code></td>
                        <td>Daftar produk di beranda tersaring hanya menampilkan produk kategori Elektronik.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Akses Halaman Tentang Kami</td>
                        <td><code>GET /about</code></td>
                        <td>Halaman profil toko dan fitur utama ShopEase tampil rapi (HTTP 200).</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Validasi Form Kontak</td>
                        <td><code>POST /contact/send</code></td>
                        <td>Input tidak valid ditolak dengan pesan error; input valid menampilkan notifikasi sukses.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 5. Screenshot -->
            <h2>5. Tangkapan Layar Landing Page &amp; Navigasi</h2>
            <p>Berikut tangkapan layar tampilan landing page baru ShopEase beserta halaman Tentang Kami dan Kontak. Klik gambar untuk memperbesar:</p>

            <div id="screenshot-container">
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m10-home.png" alt="Landing Page ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 1: Tampilan Landing Page ShopEase (Hero Banner, Ringkasan Etalase, Trust Strip, dan Kategori Produk).</p>
                </div>
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m10-about.png" alt="Halaman Tentang Kami ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 2: Halaman Tentang Kami (/about) dengan kartu penjelasan arsitektur MVC dan fitur.</p>
                </div>
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m10-contact.png" alt="Halaman Kontak ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 3: Halaman Kontak (/contact) dilengkapi kartu info dukungan dan formulir pesan tervalidasi CSRF.</p>
                </div>
            </div>

            <hr>

            <!-- 6. Q&A -->
            <h2>6. Pertanyaan Pemahaman Konsep MVC &amp; Routing</h2>
            <div class="qa-box">
                <h4>Q1: Mengapa menggunakan <code>$this-&gt;extend('layouts/main')</code> pada view CodeIgniter 4?</h4>
                <p><strong>Jawaban:</strong> Fitur View Layouts menghindari duplikasi struktur HTML (<code>&lt;head&gt;</code>, Navbar, dan Footer) di setiap file view. Halaman cukup mendefinisikan bagian kontennya saja di dalam <code>section('content')</code>.</p>
            </div>
            <div class="qa-box">
                <h4>Q2: Apa fungsi helper <code>esc()</code> ketika menampilkan data dari controller/database di View?</h4>
                <p><strong>Jawaban:</strong> <code>esc()</code> mengonversi karakter khusus HTML menjadi entitas aman untuk mencegah serangan <em>Cross-Site Scripting (XSS)</em>.</p>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 10 &bull; <a href="https://github.com/YOGA3321/tugas-pweb---pbo" target="_blank" rel="noopener noreferrer">GitHub Repository</a> &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
        </footer>
    </div>

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
        }, function() {
            button.innerText = 'Gagal';
        });
    }
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");
    function openModal(element) { modal.style.display = "block"; modal.style.opacity = "1"; modalImg.src = element.src; }
    function closeModal() { modal.style.opacity = "0"; setTimeout(function() { modal.style.display = "none"; }, 300); }
    </script>
</body>
</html>
