<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: ShopEase Online Store (CodeIgniter 4 &amp; MariaDB) - PBKK</title>
    
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
            <h1>Pengembangan Aplikasi Toko Online &ldquo;ShopEase&rdquo; (CodeIgniter 4 &amp; MariaDB)</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Teknologi:</strong> CodeIgniter 4.7.6 (PHP 8.5), MariaDB 11.8 (Port 3305), Bootstrap 5 &bull; 
                <strong>Cakupan:</strong> Setup DB, Routing &amp; MVC, Auth Role Admin/Customer, CRUD Kategori &amp; Produk + Upload Gambar
            </div>

            <div class="github-box">
                <div class="github-box-info">
                    <strong>📦 Repositori GitHub Source Code</strong>
                    <span>https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan10/demo</span>
                </div>
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    <a href="https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan10/demo" target="_blank" rel="noopener noreferrer" class="btn-github">🔗 Lihat di GitHub &rarr;</a>
                </div>
            </div>

            <hr>

            <!-- 1. Pendahuluan & Ringkasan -->
            <h2>1. Pendahuluan &amp; Ruang Lingkup Implementasi</h2>
            <p>
                Pada Pertemuan 10, dikembangkan aplikasi toko online <strong>ShopEase</strong> berbasis studi kasus dan <em>Product Requirement Document (PRD)</em> menggunakan framework <strong>CodeIgniter 4</strong> serta database <strong>MariaDB</strong> (<code>db_shopease</code> pada port <code>3305</code>). Implementasi mengikuti tahapan <strong>Hands-On Lab Praktikum 1 hingga Praktikum 6</strong> yang berfokus pada fondasi MVC, koneksi database relasional, halaman publik standar (Beranda, Tentang Kami, Kontak), sistem autentikasi &amp; otorisasi (<code>Login</code>, <code>Register</code>, <code>Logout</code>, dan <code>AuthFilter</code>), serta modul admin untuk <strong>CRUD Kategori</strong> dan <strong>CRUD Produk beserta Upload Gambar</strong>.
            </p>

            <div class="architecture-card">
                <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem;">🏗️ Alur Request–Response &amp; Arsitektur MVC CodeIgniter 4</h3>
                <div class="architecture-grid">
                    <div class="architecture-step">
                        <strong>1. Routing &amp; Filter</strong>
                        <span><code>Routes.php</code> memetakan URL ke controller. Filter global <code>csrf</code> dan route filter <code>auth:admin</code> memvalidasi keamanan &amp; hak akses.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>2. Controller</strong>
                        <span><code>HomeController</code>, <code>AuthController</code>, <code>CategoryController</code>, dan <code>ProductController</code> memvalidasi input &amp; upload file.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>3. Model &amp; MariaDB</strong>
                        <span><code>UserModel</code>, <code>CategoryModel</code>, dan <code>ProductModel</code> berinteraksi dengan <code>db_shopease</code> melalui Query Builder CI4.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>4. View &amp; Layout</strong>
                        <span>Template Bootstrap 5 menggunakan <code>extend('layouts/main')</code> dan helper <code>esc()</code> untuk mencegah XSS.</span>
                    </div>
                </div>
            </div>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>🗄️ Database MariaDB (Port 3305)</h4>
                    <p>Skema <code>db_shopease</code> berisi tabel <code>users</code>, <code>categories</code>, <code>products</code> (foreign key ke kategori), <code>orders</code>, dan <code>order_items</code> beserta 10 data produk awal.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🔐 Auth &amp; Role Access (RBAC)</h4>
                    <p>Password di-hash menggunakan <code>password_hash()</code> dan diverifikasi via <code>password_verify()</code>. <code>AuthFilter</code> menolak akses <code>/admin/*</code> dari user non-admin.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🏷️ CRUD Kategori + Proteksi Relasi</h4>
                    <p>Slug kategori dibuat otomatis dengan <code>url_title()</code>, dan penghapusan kategori dicegah apabila masih ada produk yang mereferensikannya.</p>
                </div>
                <div class="code-summary-box">
                    <h4>📦 CRUD Produk + Upload Gambar</h4>
                    <p>Validasi MIME type (JPG/PNG/WEBP), batas ukuran maks. 2 MB, penamaan acak via <code>getRandomName()</code> ke <code>public/uploads/products/</code>.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Struktur Folder -->
            <h2>2. Struktur Direktori Project (<code>pbkk/pertemuan10/demo/</code>)</h2>
            <div class="terminal-box">
pbkk/pertemuan10/demo/<br>
├── .env                                &larr; Konfigurasi DB MariaDB port 3305 &amp; baseURL<br>
├── database_shopease.sql               &larr; Skema tabel + seed user, kategori, dan 10 produk<br>
├── app/<br>
│   ├── Config/<br>
│   │   ├── Filters.php                 &larr; Aktivasi global CSRF &amp; alias filter 'auth'<br>
│   │   └── Routes.php                  &larr; Routing publik, auth, dan grup /admin<br>
│   ├── Filters/<br>
│   │   └── AuthFilter.php              &larr; Proteksi session login dan pengecekan role<br>
│   ├── Controllers/<br>
│   │   ├── HomeController.php          &larr; Homepage katalog &amp; filter kategori<br>
│   │   ├── AboutController.php         &larr; Halaman Tentang Kami<br>
│   │   ├── ContactController.php       &larr; Halaman Kontak &amp; validasi form<br>
│   │   ├── AuthController.php          &larr; Login, Register, Logout<br>
│   │   ├── CategoryController.php      &larr; CRUD Kategori Produk<br>
│   │   └── ProductController.php       &larr; CRUD Produk + Upload Gambar<br>
│   ├── Models/<br>
│   │   ├── UserModel.php<br>
│   │   ├── CategoryModel.php<br>
│   │   └── ProductModel.php<br>
│   └── Views/<br>
│       ├── layouts/main.php            &larr; Layout utama Bootstrap 5<br>
│       ├── partials/ (navbar, footer, alerts)<br>
│       ├── frontend/ (home, about, contact)<br>
│       ├── auth/ (login, register)<br>
│       └── admin/<br>
│           ├── categories/ (index, create, edit)<br>
│           └── products/ (index, create, edit)<br>
└── public/uploads/products/            &larr; Direktori penyimpanan gambar produk
            </div>

            <hr>

            <!-- 3. Cara Menjalankan -->
            <h2>3. Cara Menjalankan Aplikasi di Komputer Lokal</h2>
            <div class="terminal-box">
                <span class="prompt"># 1. Import database &amp; data awal ke MariaDB (port 3305):</span><br>
                mysql -h 127.0.0.1 -P 3305 -u shopease -pshopease123 db_shopease &lt; pbkk/pertemuan10/demo/database_shopease.sql<br><br>
                <span class="prompt"># 2. Masuk ke direktori root project CodeIgniter 4:</span><br>
                cd pbkk/pertemuan10/demo<br><br>
                <span class="prompt"># 3. Jalankan server development CodeIgniter 4 (port 8090):</span><br>
                php spark serve --port 8090<br><br>
                <span class="prompt"># 4. Buka di browser:</span><br>
                http://localhost:8090/
            </div>
            <p>
                <strong>Akun Demo untuk Pengujian:</strong> Admin (<code>admin@shopease.test</code> / <code>admin123</code>) dan Customer (<code>customer@shopease.test</code> / <code>customer123</code>).
            </p>

            <hr>

            <!-- 4. Source Code Lengkap -->
            <h2>4. Source Code Lengkap</h2>

            <h3>A. Konfigurasi Environment: <code>.env</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeEnv10')">Copy Code</button>
                <pre><code id="codeEnv10">#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------

app.baseURL = 'http://localhost:8090/'
app.indexPage = ''

#--------------------------------------------------------------------
# DATABASE (MariaDB Ubuntu Native Port 3305)
#--------------------------------------------------------------------

database.default.hostname = 127.0.0.1
database.default.database = db_shopease
database.default.username = shopease
database.default.password = shopease123
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3305</code></pre>
            </div>

            <h3>B. Skema &amp; Seed Database: <code>database_shopease.sql</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeSql10')">Copy Code</button>
                <pre><code id="codeSql10">CREATE DATABASE IF NOT EXISTS db_shopease
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE db_shopease;

DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer', 'operator') DEFAULT 'customer',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(120) UNIQUE,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

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

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_number VARCHAR(50) UNIQUE NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    order_status VARCHAR(30) DEFAULT 'pending_payment',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    product_name VARCHAR(150) NOT NULL,
    price DECIMAL(12,2) NOT NULL,
    quantity INT NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    CONSTRAINT fk_order_items_order FOREIGN KEY (order_id) REFERENCES orders(id),
    CONSTRAINT fk_order_items_product FOREIGN KEY (product_id) REFERENCES products(id)
);</code></pre>
            </div>

            <h3>C. Routing &amp; Security Filter: <code>Routes.php</code> &amp; <code>AuthFilter.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeRoutes10')">Copy Code</button>
                <pre><code id="codeRoutes10">// ===== app/Config/Routes.php =====
&lt;?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes-&gt;get('/', 'HomeController::index', ['as' =&gt; 'home']);
$routes-&gt;get('about', 'AboutController::index', ['as' =&gt; 'about']);
$routes-&gt;get('contact', 'ContactController::index', ['as' =&gt; 'contact']);
$routes-&gt;post('contact/send', 'ContactController::send', ['as' =&gt; 'contact.send']);

$routes-&gt;get('login', 'AuthController::loginForm', ['as' =&gt; 'login']);
$routes-&gt;post('login', 'AuthController::login');
$routes-&gt;get('register', 'AuthController::registerForm', ['as' =&gt; 'register']);
$routes-&gt;post('register', 'AuthController::register');
$routes-&gt;get('logout', 'AuthController::logout', ['as' =&gt; 'logout']);

$routes-&gt;group('admin', ['filter' =&gt; 'auth:admin'], static function ($routes) {
    $routes-&gt;get('categories', 'CategoryController::index');
    $routes-&gt;get('categories/create', 'CategoryController::create');
    $routes-&gt;post('categories/store', 'CategoryController::store');
    $routes-&gt;get('categories/edit/(:num)', 'CategoryController::edit/$1');
    $routes-&gt;post('categories/update/(:num)', 'CategoryController::update/$1');
    $routes-&gt;post('categories/delete/(:num)', 'CategoryController::delete/$1');

    $routes-&gt;get('products', 'ProductController::index');
    $routes-&gt;get('products/create', 'ProductController::create');
    $routes-&gt;post('products/store', 'ProductController::store');
    $routes-&gt;get('products/edit/(:num)', 'ProductController::edit/$1');
    $routes-&gt;post('products/update/(:num)', 'ProductController::update/$1');
    $routes-&gt;post('products/delete/(:num)', 'ProductController::delete/$1');
});

// ===== app/Filters/AuthFilter.php =====
&lt;?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()-&gt;get('logged_in')) {
            return redirect()-&gt;to('/login')
                -&gt;with('error', 'Silakan login terlebih dahulu untuk mengakses halaman tersebut.');
        }

        if ($arguments &amp;&amp; ! in_array(session()-&gt;get('role'), $arguments, true)) {
            return redirect()-&gt;to('/')
                -&gt;with('error', 'Akses ditolak! Halaman tersebut hanya untuk role: ' . implode(', ', $arguments) . '.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}</code></pre>
            </div>

            <h3>D. Models: <code>UserModel.php</code>, <code>CategoryModel.php</code>, &amp; <code>ProductModel.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeModels10')">Copy Code</button>
                <pre><code id="codeModels10">// ===== app/Models/UserModel.php =====
&lt;?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'role'];
    protected $useTimestamps = false;
}

// ===== app/Models/CategoryModel.php =====
&lt;?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table         = 'categories';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'slug', 'description'];
    protected $useTimestamps = false;
}

// ===== app/Models/ProductModel.php =====
&lt;?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table         = 'products';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'category_id', 'name', 'description',
        'price', 'stock', 'image', 'status',
    ];
    protected $useTimestamps = false;
}</code></pre>
            </div>

            <h3>E. Controllers Publik &amp; Autentikasi: <code>HomeController.php</code> &amp; <code>AuthController.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeHomeAuth10')">Copy Code</button>
                <pre><code id="codeHomeAuth10">// ===== app/Controllers/HomeController.php =====
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

// ===== app/Controllers/AuthController.php =====
&lt;?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginForm()
    {
        if (session()-&gt;get('logged_in')) {
            return redirect()-&gt;to(session()-&gt;get('role') === 'admin' ? '/admin/products' : '/');
        }

        return view('auth/login', ['title' =&gt; 'Login – ShopEase', 'active' =&gt; 'login']);
    }

    public function login()
    {
        $rules = ['email' =&gt; 'required|valid_email', 'password' =&gt; 'required'];
        if (! $this-&gt;validate($rules)) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        $email    = trim((string) $this-&gt;request-&gt;getPost('email'));
        $password = (string) $this-&gt;request-&gt;getPost('password');
        $user     = (new UserModel())-&gt;where('email', $email)-&gt;first();

        if ($user &amp;&amp; password_verify($password, $user['password'])) {
            session()-&gt;regenerate();
            session()-&gt;set([
                'user_id'   =&gt; $user['id'],
                'name'      =&gt; $user['name'],
                'email'     =&gt; $user['email'],
                'role'      =&gt; $user['role'],
                'logged_in' =&gt; true,
            ]);

            if ($user['role'] === 'admin') {
                return redirect()-&gt;to('/admin/products')
                    -&gt;with('success', 'Selamat datang kembali, ' . $user['name'] . '!');
            }

            return redirect()-&gt;to('/')
                -&gt;with('success', 'Login berhasil! Selamat berbelanja, ' . $user['name'] . '.');
        }

        return redirect()-&gt;back()-&gt;withInput()-&gt;with('error', 'Email atau password salah.');
    }

    public function registerForm()
    {
        if (session()-&gt;get('logged_in')) {
            return redirect()-&gt;to('/');
        }

        return view('auth/register', ['title' =&gt; 'Registrasi Akun – ShopEase', 'active' =&gt; 'register']);
    }

    public function register()
    {
        $rules = [
            'name'             =&gt; 'required|min_length[3]|max_length[100]',
            'email'            =&gt; 'required|valid_email|is_unique[users.email]',
            'password'         =&gt; 'required|min_length[6]',
            'password_confirm' =&gt; 'required|matches[password]',
        ];

        if (! $this-&gt;validate($rules)) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        (new UserModel())-&gt;insert([
            'name'     =&gt; trim((string) $this-&gt;request-&gt;getPost('name')),
            'email'    =&gt; trim((string) $this-&gt;request-&gt;getPost('email')),
            'password' =&gt; password_hash((string) $this-&gt;request-&gt;getPost('password'), PASSWORD_DEFAULT),
            'role'     =&gt; 'customer',
        ]);

        return redirect()-&gt;to('/login')-&gt;with('success', 'Registrasi berhasil! Silakan login dengan akun baru Anda.');
    }

    public function logout()
    {
        session()-&gt;destroy();
        return redirect()-&gt;to('/login')-&gt;with('success', 'Anda telah keluar dari sesi.');
    }
}</code></pre>
            </div>

            <h3>F. Controllers Admin CRUD: <code>CategoryController.php</code> &amp; <code>ProductController.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeCrud10')">Copy Code</button>
                <pre><code id="codeCrud10">// ===== app/Controllers/CategoryController.php =====
&lt;?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class CategoryController extends BaseController
{
    public function index(): string
    {
        $categories = (new CategoryModel())
            -&gt;select('categories.*, COUNT(products.id) AS product_count')
            -&gt;join('products', 'products.category_id = categories.id', 'left')
            -&gt;groupBy('categories.id')
            -&gt;orderBy('categories.id', 'ASC')
            -&gt;findAll();

        return view('admin/categories/index', [
            'title'      =&gt; 'Manajemen Kategori – Admin ShopEase',
            'active'     =&gt; 'categories',
            'categories' =&gt; $categories,
        ]);
    }

    public function create(): string
    {
        return view('admin/categories/create', ['title' =&gt; 'Tambah Kategori – Admin ShopEase', 'active' =&gt; 'categories']);
    }

    public function store()
    {
        if (! $this-&gt;validate(['name' =&gt; 'required|min_length[3]|max_length[100]|is_unique[categories.name]'])) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        $name = trim((string) $this-&gt;request-&gt;getPost('name'));
        (new CategoryModel())-&gt;insert([
            'name'        =&gt; $name,
            'slug'        =&gt; url_title($name, '-', true),
            'description' =&gt; trim((string) $this-&gt;request-&gt;getPost('description')),
        ]);

        return redirect()-&gt;to('/admin/categories')-&gt;with('success', 'Kategori "' . $name . '" berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $category = (new CategoryModel())-&gt;find($id);
        if (! $category) {
            return redirect()-&gt;to('/admin/categories')-&gt;with('error', 'Kategori tidak ditemukan.');
        }

        return view('admin/categories/edit', [
            'title'    =&gt; 'Edit Kategori – Admin ShopEase',
            'active'   =&gt; 'categories',
            'category' =&gt; $category,
        ]);
    }

    public function update(int $id)
    {
        $model = new CategoryModel();
        if (! $model-&gt;find($id)) {
            return redirect()-&gt;to('/admin/categories')-&gt;with('error', 'Kategori tidak ditemukan.');
        }

        if (! $this-&gt;validate(['name' =&gt; "required|min_length[3]|max_length[100]|is_unique[categories.name,id,{$id}]"])) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        $name = trim((string) $this-&gt;request-&gt;getPost('name'));
        $model-&gt;update($id, [
            'name'        =&gt; $name,
            'slug'        =&gt; url_title($name, '-', true),
            'description' =&gt; trim((string) $this-&gt;request-&gt;getPost('description')),
        ]);

        return redirect()-&gt;to('/admin/categories')-&gt;with('success', 'Kategori "' . $name . '" berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $categoryModel = new CategoryModel();
        $category      = $categoryModel-&gt;find($id);
        if (! $category) {
            return redirect()-&gt;to('/admin/categories')-&gt;with('error', 'Kategori tidak ditemukan.');
        }

        $usedCount = (new ProductModel())-&gt;where('category_id', $id)-&gt;countAllResults();
        if ($usedCount &gt; 0) {
            return redirect()-&gt;to('/admin/categories')
                -&gt;with('error', 'Kategori "' . $category['name'] . '" tidak dapat dihapus karena masih digunakan oleh ' . $usedCount . ' produk.');
        }

        $categoryModel-&gt;delete($id);
        return redirect()-&gt;to('/admin/categories')-&gt;with('success', 'Kategori "' . $category['name'] . '" berhasil dihapus.');
    }
}

// ===== app/Controllers/ProductController.php =====
&lt;?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    private const ALLOWED_MIME_TYPES = ['image/jpeg', 'image/png', 'image/webp'];
    private const MAX_IMAGE_BYTES    = 2 * 1024 * 1024;

    public function index(): string
    {
        $products = (new ProductModel())
            -&gt;select('products.*, categories.name AS category_name')
            -&gt;join('categories', 'categories.id = products.category_id')
            -&gt;orderBy('products.id', 'DESC')
            -&gt;findAll();

        return view('admin/products/index', [
            'title'    =&gt; 'Manajemen Produk – Admin ShopEase',
            'active'   =&gt; 'products',
            'products' =&gt; $products,
        ]);
    }

    public function create(): string
    {
        return view('admin/products/create', [
            'title'      =&gt; 'Tambah Produk – Admin ShopEase',
            'active'     =&gt; 'products',
            'categories' =&gt; (new CategoryModel())-&gt;orderBy('name', 'ASC')-&gt;findAll(),
        ]);
    }

    public function store()
    {
        $rules = [
            'category_id' =&gt; 'required|is_not_unique[categories.id]',
            'name'        =&gt; 'required|min_length[3]|max_length[150]',
            'price'       =&gt; 'required|numeric|greater_than_equal_to[0]',
            'stock'       =&gt; 'required|integer|greater_than_equal_to[0]',
            'status'      =&gt; 'required|in_list[active,inactive]',
        ];

        if (! $this-&gt;validate($rules)) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        $imageName = null;
        $image     = $this-&gt;request-&gt;getFile('image');
        if ($image &amp;&amp; $image-&gt;getError() !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this-&gt;handleImageUpload($image);
            if ($uploadResult['error'] !== null) {
                return redirect()-&gt;back()-&gt;withInput()-&gt;with('error', $uploadResult['error']);
            }
            $imageName = $uploadResult['filename'];
        }

        $name = trim((string) $this-&gt;request-&gt;getPost('name'));
        (new ProductModel())-&gt;insert([
            'category_id' =&gt; (int) $this-&gt;request-&gt;getPost('category_id'),
            'name'        =&gt; $name,
            'description' =&gt; trim((string) $this-&gt;request-&gt;getPost('description')),
            'price'       =&gt; (float) $this-&gt;request-&gt;getPost('price'),
            'stock'       =&gt; (int) $this-&gt;request-&gt;getPost('stock'),
            'image'       =&gt; $imageName,
            'status'      =&gt; (string) $this-&gt;request-&gt;getPost('status'),
        ]);

        return redirect()-&gt;to('/admin/products')-&gt;with('success', 'Produk "' . $name . '" berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $product = (new ProductModel())-&gt;find($id);
        if (! $product) {
            return redirect()-&gt;to('/admin/products')-&gt;with('error', 'Produk tidak ditemukan.');
        }

        return view('admin/products/edit', [
            'title'      =&gt; 'Edit Produk – Admin ShopEase',
            'active'     =&gt; 'products',
            'product'    =&gt; $product,
            'categories' =&gt; (new CategoryModel())-&gt;orderBy('name', 'ASC')-&gt;findAll(),
        ]);
    }

    public function update(int $id)
    {
        $productModel = new ProductModel();
        $product      = $productModel-&gt;find($id);
        if (! $product) {
            return redirect()-&gt;to('/admin/products')-&gt;with('error', 'Produk tidak ditemukan.');
        }

        $rules = [
            'category_id' =&gt; 'required|is_not_unique[categories.id]',
            'name'        =&gt; 'required|min_length[3]|max_length[150]',
            'price'       =&gt; 'required|numeric|greater_than_equal_to[0]',
            'stock'       =&gt; 'required|integer|greater_than_equal_to[0]',
            'status'      =&gt; 'required|in_list[active,inactive]',
        ];

        if (! $this-&gt;validate($rules)) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        $imageName = $product['image'];
        $image     = $this-&gt;request-&gt;getFile('image');
        if ($image &amp;&amp; $image-&gt;getError() !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this-&gt;handleImageUpload($image);
            if ($uploadResult['error'] !== null) {
                return redirect()-&gt;back()-&gt;withInput()-&gt;with('error', $uploadResult['error']);
            }
            $this-&gt;removeImageFile($product['image']);
            $imageName = $uploadResult['filename'];
        }

        $name = trim((string) $this-&gt;request-&gt;getPost('name'));
        $productModel-&gt;update($id, [
            'category_id' =&gt; (int) $this-&gt;request-&gt;getPost('category_id'),
            'name'        =&gt; $name,
            'description' =&gt; trim((string) $this-&gt;request-&gt;getPost('description')),
            'price'       =&gt; (float) $this-&gt;request-&gt;getPost('price'),
            'stock'       =&gt; (int) $this-&gt;request-&gt;getPost('stock'),
            'image'       =&gt; $imageName,
            'status'      =&gt; (string) $this-&gt;request-&gt;getPost('status'),
        ]);

        return redirect()-&gt;to('/admin/products')-&gt;with('success', 'Produk "' . $name . '" berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $productModel = new ProductModel();
        $product      = $productModel-&gt;find($id);
        if (! $product) {
            return redirect()-&gt;to('/admin/products')-&gt;with('error', 'Produk tidak ditemukan.');
        }

        $this-&gt;removeImageFile($product['image']);
        $productModel-&gt;delete($id);
        return redirect()-&gt;to('/admin/products')-&gt;with('success', 'Produk "' . $product['name'] . '" berhasil dihapus.');
    }

    private function handleImageUpload($image): array
    {
        if (! $image-&gt;isValid() || $image-&gt;hasMoved()) {
            return ['filename' =&gt; null, 'error' =&gt; 'Gagal mengunggah gambar produk.'];
        }
        if (! in_array($image-&gt;getMimeType(), self::ALLOWED_MIME_TYPES, true)) {
            return ['filename' =&gt; null, 'error' =&gt; 'Format gambar harus JPG, PNG, atau WEBP.'];
        }
        if ($image-&gt;getSize() &gt; self::MAX_IMAGE_BYTES) {
            return ['filename' =&gt; null, 'error' =&gt; 'Ukuran gambar maksimal 2 MB.'];
        }

        $uploadDir = FCPATH . 'uploads/products';
        if (! is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $newName = $image-&gt;getRandomName();
        $image-&gt;move($uploadDir, $newName);
        return ['filename' =&gt; $newName, 'error' =&gt; null];
    }

    private function removeImageFile(?string $filename): void
    {
        if (empty($filename)) return;
        $fullPath = FCPATH . 'uploads/products/' . basename($filename);
        if (is_file($fullPath)) unlink($fullPath);
    }
}</code></pre>
            </div>

            <hr>

            <!-- 5. Tabel Pengujian -->
            <h2>5. Tabel Pengujian Fungsionalitas &amp; Keamanan</h2>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Skenario Pengujian</th>
                        <th>Endpoint / Aksi</th>
                        <th>Hasil yang Diharapkan</th>
                        <th style="width: 110px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Halaman Publik Standar</td>
                        <td><code>GET /</code>, <code>/about</code>, <code>/contact</code></td>
                        <td>Seluruh halaman tampil (HTTP 200) beserta kategori dan 10 produk aktif dari MariaDB.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Akses Admin Tanpa Login</td>
                        <td><code>GET /admin/categories</code></td>
                        <td>Diblokir oleh <code>AuthFilter</code> dan diarahkan ke halaman <code>/login</code> (HTTP 302).</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Akses Admin oleh Customer</td>
                        <td>Login customer &rarr; <code>GET /admin/products</code></td>
                        <td>Ditolak oleh <code>AuthFilter</code> (role <code>admin</code> wajib) dan diarahkan ke <code>/</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Login Admin &amp; Session</td>
                        <td><code>POST /login</code> (<code>admin@shopease.test</code>)</td>
                        <td>Password terverifikasi via <code>password_verify()</code>, session terbentuk, masuk ke <code>/admin/products</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>CRUD Kategori &amp; Proteksi FK</td>
                        <td>Tambah, hapus kategori kosong, dan uji hapus kategori berisi produk</td>
                        <td>Kategori baru tersimpan; penghapusan kategori yang masih memiliki produk ditolak dengan pesan aman.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>CRUD Produk &amp; Upload Gambar</td>
                        <td><code>POST /admin/products/store</code> (multipart PNG)</td>
                        <td>File gambar tervalidasi MIME type, tersimpan di <code>public/uploads/products/</code>, dan record tersimpan ke MariaDB.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 6. Screenshot Aplikasi -->
            <h2>6. Tangkapan Layar Aplikasi (Screenshot)</h2>
            <p>Berikut adalah hasil eksekusi langsung aplikasi <strong>ShopEase</strong> di browser. Klik pada gambar untuk memperbesar:</p>

            <div id="screenshot-container">
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m10-home.png" alt="Homepage ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 1: Halaman Beranda standar ShopEase menampilkan hero section, kategori produk, dan daftar produk aktif dari MariaDB.</p>
                </div>

                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m10-login.png" alt="Halaman Login ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 2: Halaman Login ShopEase dengan validasi CSRF dan informasi akun demo Admin/Customer.</p>
                </div>

                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m10-categories.png" alt="Admin Manajemen Kategori ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 3: Halaman Admin Manajemen Kategori lengkap dengan slug, jumlah produk berelasi, dan aksi Edit/Hapus.</p>
                </div>

                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m10-products.png" alt="Admin Manajemen Produk ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 4: Halaman Admin Manajemen Produk setelah login sebagai Administrator menampilkan 10 produk beserta kategori, harga, dan stok.</p>
                </div>
            </div>

            <hr>

            <!-- 7. Q&A -->
            <h2>7. Pertanyaan Pemahaman &amp; Keamanan</h2>
            <div class="qa-box">
                <h4>Q1: Mengapa <code>AuthFilter</code> dibutuhkan pada route grup <code>/admin</code>?</h4>
                <p><strong>Jawaban:</strong> Menyembunyikan menu di navbar saja tidak cukup karena pengguna bisa mengetik URL <code>/admin/products</code> secara langsung. <code>AuthFilter</code> berjalan di sisi server sebelum controller dieksekusi untuk memastikan pengguna sudah login dan memiliki role <code>admin</code>.</p>
            </div>
            <div class="qa-box">
                <h4>Q2: Mengapa tidak mengizinkan penghapusan kategori yang masih memiliki produk?</h4>
                <p><strong>Jawaban:</strong> Tabel <code>products</code> memiliki <em>Foreign Key</em> <code>category_id</code> ke <code>categories.id</code> dengan aturan <code>ON DELETE RESTRICT</code>. Pengecekan di controller mencegah <em>database constraint error</em> sekaligus memberi pesan yang ramah ke admin.</p>
            </div>
            <div class="qa-box">
                <h4>Q3: Mengapa file gambar yang diunggah perlu diubah namanya dengan <code>getRandomName()</code> dan divalidasi MIME type-nya?</h4>
                <p><strong>Jawaban:</strong> Validasi MIME type mencegah unggahan script berbahaya (seperti file <code>.php</code> yang disamarkan sebagai gambar), sedangkan <code>getRandomName()</code> mencegah bentrokan nama file serta meniadakan risiko karakter path traversal pada nama file asli pengguna.</p>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 10 &bull; <a href="https://github.com/YOGA3321/tugas-pweb---pbo" target="_blank" rel="noopener noreferrer">GitHub Repository</a> &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
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
