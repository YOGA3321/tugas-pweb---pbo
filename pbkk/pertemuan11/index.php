<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: Authentication &amp; Authorization ShopEase (CI4) - PBKK</title>
    
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
        .github-box-info strong { display: block; color: var(--text-heading); font-size: 0.96rem; }
        .github-box-info span { font-size: 0.86rem; color: var(--text-muted); word-break: break-all; }
        .btn-github {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px;
            border-radius: 10px; background: #1e293b; color: #ffffff !important;
            text-decoration: none; font-size: 0.88rem; font-weight: 600; transition: var(--transition);
        }
        .btn-github:hover { background: var(--pbkk-color); transform: translateY(-2px); }
        .code-summary-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin: 25px 0; }
        .code-summary-box { background-color: var(--bg-color); padding: 20px; border-radius: var(--radius-md); box-shadow: var(--shadow-raised-sm); }
        .code-summary-box h4 { margin: 0 0 8px 0; color: var(--text-heading); font-size: 1.05rem; }
        .code-summary-box p { margin: 0; font-size: 0.92rem; line-height: 1.6; color: var(--text-muted); }
        .architecture-card { background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(16, 185, 129, 0.05)); border: 1px solid rgba(124, 58, 237, 0.2); border-radius: var(--radius-md); padding: 24px; margin: 25px 0; }
        .architecture-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 15px; margin-top: 15px; }
        .architecture-step { background: var(--bg-color); padding: 15px; border-radius: var(--radius-sm); box-shadow: var(--shadow-raised-sm); border-left: 3px solid var(--pbkk-color); }
        .architecture-step strong { display: block; color: var(--text-heading); margin-bottom: 5px; font-size: 0.95rem; }
        .architecture-step span { font-size: 0.85rem; color: var(--text-muted); line-height: 1.4; display: block; }
        .test-table { width: 100%; border-collapse: collapse; margin: 20px 0; background-color: var(--bg-color); border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-raised-sm); }
        .test-table th, .test-table td { padding: 12px 16px; text-align: left; border-bottom: 1px solid rgba(163, 177, 198, 0.3); }
        .test-table th { background: rgba(124, 58, 237, 0.12); color: var(--pbkk-color); font-weight: 700; }
        .status-badge-ok { background: rgba(16, 185, 129, 0.15); color: #059669; padding: 4px 10px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; }
        .qa-box { background-color: var(--bg-color); padding: 20px; border-radius: var(--radius-md); box-shadow: var(--shadow-inset); margin-bottom: 20px; }
        .qa-box h4 { margin: 0 0 8px 0; color: var(--text-heading); font-size: 1rem; }
        .qa-box p { margin: 0; font-size: 0.93rem; color: var(--text-muted); line-height: 1.6; }
        .screenshot-frame { background-color: var(--bg-color); padding: 18px; border-radius: var(--radius-md); box-shadow: var(--shadow-inset); text-align: center; margin: 20px 0; }
        .screenshot-frame img { margin: 0; border-radius: 10px; border: 1px solid rgba(148, 163, 184, 0.35); }
    </style>
</head>
<body>

    <div class="container">
        <a href="../" class="tombol-kembali">&larr; Kembali ke Daftar Tugas PBKK</a>

        <div class="konten-tugas">
            <span class="badge-subject">🔐 Pertemuan 11 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>ShopEase Authentication &amp; Authorization (Login, Register, Session &amp; AuthFilter)</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Teknologi:</strong> CodeIgniter 4.7.6, MariaDB 11.8 (<code>users</code>), Session &amp; Filter RBAC &bull; 
                <strong>Fokus Modul:</strong> Registrasi, Login, Password Hashing, Session Management, dan Role Filter
            </div>

            <div class="github-box">
                <div class="github-box-info">
                    <strong>📦 Repositori GitHub Source Code (Proyek Terintegrasi ShopEase)</strong>
                    <span>https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan10/demo</span>
                </div>
                <a href="https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan10/demo" target="_blank" rel="noopener noreferrer" class="btn-github">🔗 Lihat di GitHub &rarr;</a>
            </div>

            <hr>

            <!-- 1. Pendahuluan -->
            <h2>1. Pendahuluan &amp; Konsep Keamanan Autentikasi</h2>
            <p>
                Pada Pertemuan 11 (mengacu pada <strong>Praktikum 6 – Authentication dan Authorization</strong> di dokumen <em>Hands-On Lab ShopEase</em>), aplikasi ShopEase dilengkapi sistem autentikasi pengguna dan pembatasan hak akses berbasis peran (<em>Role-Based Access Control</em> / RBAC). Pengguna dibedakan menjadi role <code>admin</code> dan <code>customer</code> pada tabel <code>users</code> di database MariaDB <code>db_shopease</code>.
            </p>

            <div class="architecture-card">
                <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem;">🛡️ Alur Autentikasi &amp; Proteksi Route Admin</h3>
                <div class="architecture-grid">
                    <div class="architecture-step">
                        <strong>1. Register &amp; Hashing</strong>
                        <span>Pendaftar baru (role <code>customer</code>) divalidasi email unik &amp; passwordnya di-hash dengan <code>password_hash()</code>.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>2. Login &amp; Session</strong>
                        <span><code>AuthController::login()</code> memverifikasi via <code>password_verify()</code> lalu memanggil <code>session()-&gt;regenerate()</code>.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>3. Role Redirect</strong>
                        <span>Admin diarahkan ke <code>/admin/dashboard</code>, sedangkan Customer diarahkan ke halaman storefront <code>/</code>.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>4. AuthFilter Guard</strong>
                        <span>Filter <code>auth:admin</code> pada grup route <code>/admin/*</code> menolak akses tamu maupun customer.</span>
                    </div>
                </div>
            </div>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>🔑 Password Hashing Aman</h4>
                    <p>Tidak pernah menyimpan password plaintext. Menggunakan <code>PASSWORD_DEFAULT</code> (bcrypt) dan verifikasi aman lewat <code>password_verify()</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🧱 Pencegahan Session Fixation</h4>
                    <p>Memanggil <code>session()-&gt;regenerate()</code> sesaat setelah login sukses agar ID sesi lama tidak dapat dibajak.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🚧 Route Filter RBAC</h4>
                    <p>Didaftarkan di <code>app/Config/Filters.php</code> dengan alias <code>'auth'</code> dan argumen role <code>auth:admin</code> pada route grup admin.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🕵️ Error Message Aman</h4>
                    <p>Saat kredensial salah, sistem hanya menampilkan <code>"Email atau password salah."</code> tanpa membocorkan apakah email terdaftar.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Source Code Lengkap -->
            <h2>2. Source Code Lengkap (Pertemuan 11 – Authentication &amp; Filter)</h2>

            <h3>A. Model User: <code>app/Models/UserModel.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeUser11')">Copy Code</button>
                <pre><code id="codeUser11">&lt;?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'role'];
    protected $useTimestamps = false;
}</code></pre>
            </div>

            <h3>B. Controller Autentikasi: <code>app/Controllers/AuthController.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeAuth11')">Copy Code</button>
                <pre><code id="codeAuth11">&lt;?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginForm()
    {
        if (session()-&gt;get('logged_in')) {
            return redirect()-&gt;to(session()-&gt;get('role') === 'admin' ? '/admin/dashboard' : '/');
        }

        return view('auth/login', [
            'title'  =&gt; 'Login – ShopEase',
            'active' =&gt; 'login',
        ]);
    }

    public function login()
    {
        $rules = [
            'email'    =&gt; 'required|valid_email',
            'password' =&gt; 'required',
        ];

        if (! $this-&gt;validate($rules)) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        $email    = trim((string) $this-&gt;request-&gt;getPost('email'));
        $password = (string) $this-&gt;request-&gt;getPost('password');

        $userModel = new UserModel();
        $user      = $userModel-&gt;where('email', $email)-&gt;first();

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
                return redirect()-&gt;to('/admin/dashboard')
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

        return view('auth/register', [
            'title'  =&gt; 'Registrasi Akun – ShopEase',
            'active' =&gt; 'register',
        ]);
    }

    public function register()
    {
        $rules = [
            'name'             =&gt; 'required|min_length[3]|max_length[100]',
            'email'            =&gt; 'required|valid_email|is_unique[users.email]',
            'password'         =&gt; 'required|min_length[6]',
            'password_confirm' =&gt; 'required|matches[password]',
        ];

        $messages = [
            'email'            =&gt; ['is_unique' =&gt; 'Email sudah terdaftar, silakan gunakan email lain atau login.'],
            'password'         =&gt; ['min_length' =&gt; 'Password minimal 6 karakter.'],
            'password_confirm' =&gt; ['matches' =&gt; 'Konfirmasi password tidak cocok.'],
        ];

        if (! $this-&gt;validate($rules, $messages)) {
            return redirect()-&gt;back()-&gt;withInput()-&gt;with('errors', $this-&gt;validator-&gt;getErrors());
        }

        $userModel = new UserModel();
        $userModel-&gt;insert([
            'name'     =&gt; trim((string) $this-&gt;request-&gt;getPost('name')),
            'email'    =&gt; trim((string) $this-&gt;request-&gt;getPost('email')),
            'password' =&gt; password_hash((string) $this-&gt;request-&gt;getPost('password'), PASSWORD_DEFAULT),
            'role'     =&gt; 'customer',
        ]);

        return redirect()-&gt;to('/login')
            -&gt;with('success', 'Registrasi berhasil! Silakan login dengan akun baru Anda.');
    }

    public function logout()
    {
        session()-&gt;destroy();
        return redirect()-&gt;to('/login')-&gt;with('success', 'Anda telah keluar dari sesi.');
    }
}</code></pre>
            </div>

            <h3>C. Filter RBAC &amp; Konfigurasi: <code>AuthFilter.php</code>, <code>Filters.php</code> &amp; <code>Routes.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeFilter11')">Copy Code</button>
                <pre><code id="codeFilter11">// ===== app/Filters/AuthFilter.php =====
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
}

// ===== app/Config/Filters.php (bagian alias &amp; CSRF) =====
public array $aliases = [
    'csrf' =&gt; CSRF::class,
    'auth' =&gt; \App\Filters\AuthFilter::class,
    // ...
];

public array $globals = [
    'before' =&gt; ['csrf'],
    'after'  =&gt; [],
];

// ===== app/Config/Routes.php (route auth &amp; proteksi admin) =====
$routes-&gt;get('login', 'AuthController::loginForm', ['as' =&gt; 'login']);
$routes-&gt;post('login', 'AuthController::login');
$routes-&gt;get('register', 'AuthController::registerForm', ['as' =&gt; 'register']);
$routes-&gt;post('register', 'AuthController::register');
$routes-&gt;get('logout', 'AuthController::logout', ['as' =&gt; 'logout']);

$routes-&gt;group('admin', ['filter' =&gt; 'auth:admin'], static function ($routes) {
    $routes-&gt;get('/', 'AdminDashboardController::index');
    $routes-&gt;get('dashboard', 'AdminDashboardController::index');
    // ... route categories &amp; products
});</code></pre>
            </div>

            <h3>D. View Login &amp; Registrasi: <code>app/Views/auth/login.php</code> &amp; <code>register.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeViews11')">Copy Code</button>
                <pre><code id="codeViews11">&lt;!-- app/Views/auth/login.php --&gt;
&lt;?= $this-&gt;extend('layouts/main') ?&gt;
&lt;?= $this-&gt;section('content') ?&gt;
&lt;div class="row justify-content-center"&gt;
    &lt;div class="col-md-5"&gt;
        &lt;div class="card shadow-sm"&gt;
            &lt;div class="card-body p-4"&gt;
                &lt;h1 class="h4 fw-bold mb-1 text-center"&gt;Login ShopEase&lt;/h1&gt;
                &lt;p class="text-muted small text-center mb-4"&gt;Masuk sebagai Admin atau Customer&lt;/p&gt;
                &lt;form method="post" action="/login"&gt;
                    &lt;?= csrf_field() ?&gt;
                    &lt;div class="mb-3"&gt;
                        &lt;label for="email" class="form-label"&gt;Email&lt;/label&gt;
                        &lt;input type="email" class="form-control" id="email" name="email" value="&lt;?= old('email') ?&gt;" required autofocus&gt;
                    &lt;/div&gt;
                    &lt;div class="mb-3"&gt;
                        &lt;label for="password" class="form-label"&gt;Password&lt;/label&gt;
                        &lt;input type="password" class="form-control" id="password" name="password" required&gt;
                    &lt;/div&gt;
                    &lt;button type="submit" class="btn btn-primary w-100"&gt;Login&lt;/button&gt;
                &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;?= $this-&gt;endSection() ?&gt;</code></pre>
            </div>

            <hr>

            <!-- 3. Tabel Pengujian -->
            <h2>3. Tabel Pengujian Autentikasi &amp; Otorisasi</h2>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Skenario Pengujian</th>
                        <th>Aksi Pengguna</th>
                        <th>Hasil yang Diharapkan</th>
                        <th style="width: 110px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Registrasi Customer Baru</td>
                        <td>Isi nama, email unik, password &amp; konfirmasi &rarr; <code>POST /register</code></td>
                        <td>Password ter-hash di tabel <code>users</code> dengan role <code>customer</code> dan redirect ke <code>/login</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Login Kredensial Salah</td>
                        <td>Submit email/password tidak sesuai ke <code>POST /login</code></td>
                        <td>Akses ditolak dan muncul pesan <code>"Email atau password salah."</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Akses Admin Tanpa Login</td>
                        <td>Buka langsung <code>GET /admin/dashboard</code> sebelum login</td>
                        <td><code>AuthFilter</code> memblokir dan me-redirect ke <code>/login</code> dengan pesan peringatan.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Customer Mengakses Admin</td>
                        <td>Login sebagai <code>customer@shopease.test</code> &rarr; buka <code>/admin/products</code></td>
                        <td><code>AuthFilter</code> mendeteksi role bukan <code>admin</code> dan me-redirect ke <code>/</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Login Admin &amp; Logout</td>
                        <td>Login sebagai <code>admin@shopease.test</code> lalu klik Logout</td>
                        <td>Masuk ke <code>/admin/dashboard</code> saat login; session dihancurkan saat logout.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 4. Screenshot -->
            <h2>4. Tangkapan Layar Autentikasi &amp; AuthFilter</h2>
            <div id="screenshot-container">
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m11-login.png" alt="Halaman Login ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 1: Halaman Login (/login) dilengkapi token CSRF dan panduan akun demo Admin/Customer.</p>
                </div>
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m11-register.png" alt="Halaman Registrasi ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 2: Halaman Registrasi Akun Customer (/register) dengan validasi konfirmasi password.</p>
                </div>
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m11-authfilter.png" alt="Proteksi AuthFilter saat mengakses Admin tanpa login" onclick="openModal(this)">
                    <p class="caption">Gambar 3: Proteksi AuthFilter otomatis mengarahkan akses ilegal ke /admin/dashboard kembali ke halaman /login beserta peringatan.</p>
                </div>
            </div>

            <hr>

            <!-- 5. Q&A -->
            <h2>5. Pertanyaan Pemahaman Konsep Keamanan Auth</h2>
            <div class="qa-box">
                <h4>Q1: Mengapa memakai <code>password_hash()</code> dan <code>password_verify()</code> dibandingkan enkripsi biasa atau MD5?</h4>
                <p><strong>Jawaban:</strong> <code>password_hash()</code> menggunakan algoritma hashing satu arah modern (bcrypt) lengkap dengan random salt otomatis per pengguna, sehingga tahan terhadap serangan rainbow table dan brute-force.</p>
            </div>
            <div class="qa-box">
                <h4>Q2: Bagaimana cara kerja argumen <code>'auth:admin'</code> pada CodeIgniter Filter?</h4>
                <p><strong>Jawaban:</strong> String setelah titik dua (<code>admin</code>) otomatis dikirim sebagai array <code>$arguments</code> ke method <code>before()</code> di <code>AuthFilter</code>, sehingga satu class filter dapat digunakan untuk memeriksa berbagai role secara dinamis.</p>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 11 &bull; <a href="https://github.com/YOGA3321/tugas-pweb---pbo" target="_blank" rel="noopener noreferrer">GitHub Repository</a> &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
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
