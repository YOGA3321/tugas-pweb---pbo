<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: Admin Dashboard &amp; CRUD Kategori + Produk ShopEase (CI4) - PBKK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css?v=<?= time() ?>">
    <style>
        .badge-subject {
            display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 20px;
            font-size: 0.82rem; font-weight: 600; background: rgba(124, 58, 237, 0.12); color: var(--pbkk-color); margin-bottom: 15px;
        }
        .github-box {
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.04), rgba(124, 58, 237, 0.06));
            border: 1px solid rgba(124, 58, 237, 0.25); border-radius: var(--radius-md); padding: 16px 20px; margin: 20px 0 25px;
        }
        .github-box-info strong { display: block; color: var(--text-heading); font-size: 0.96rem; }
        .github-box-info span { font-size: 0.86rem; color: var(--text-muted); word-break: break-all; }
        .btn-github {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; border-radius: 10px;
            background: #1e293b; color: #ffffff !important; text-decoration: none; font-size: 0.88rem; font-weight: 600; transition: var(--transition);
        }
        .btn-github:hover { background: var(--pbkk-color); transform: translateY(-2px); }
        .code-summary-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin: 25px 0; }
        .code-summary-box { background-color: var(--bg-color); padding: 20px; border-radius: var(--radius-md); box-shadow: var(--shadow-raised-sm); }
        .code-summary-box h4 { margin: 0 0 8px 0; color: var(--text-heading); font-size: 1.05rem; }
        .code-summary-box p { margin: 0; font-size: 0.92rem; line-height: 1.6; color: var(--text-muted); }
        .architecture-card { background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(37, 99, 235, 0.05)); border: 1px solid rgba(124, 58, 237, 0.2); border-radius: var(--radius-md); padding: 24px; margin: 25px 0; }
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
            <span class="badge-subject">📦 Pertemuan 12 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>ShopEase Admin Terminal: Dashboard Sidebar &amp; CRUD Kategori + Produk</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Teknologi:</strong> CodeIgniter 4.7.6, MariaDB 11.8 (<code>categories</code>, <code>products</code>), Bootstrap 5 Admin Sidebar &bull; 
                <strong>Fokus Modul:</strong> Admin Dashboard, CRUD Kategori, CRUD Produk &amp; Upload Gambar
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
            <h2>1. Pendahuluan &amp; Desain Panel Admin</h2>
            <p>
                Pada Pertemuan 12 (mengacu pada <strong>Praktikum 4 &amp; Praktikum 5 – CRUD Kategori dan CRUD Produk + Upload Gambar</strong> pada dokumen <em>Hands-On Lab ShopEase</em>), dibangun panel administrator dengan tata letak profesional berupa <strong>Sidebar Navigasi Tetap di sebelah kiri</strong> dan <strong>Workspace Konten Utama di sebelah kanan</strong> (<code>layouts/admin.php</code>).
            </p>
            <p>
                Panel admin mencakup halaman ringkasan <strong>Overview &amp; Catalog Dashboard</strong>, modul <strong>CRUD Kategori Produk</strong> yang menjaga integritas relasi <em>Foreign Key</em>, serta modul <strong>CRUD Produk</strong> lengkap dengan fitur unggah gambar yang tervalidasi MIME type dan ukuran file.
            </p>

            <div class="architecture-card">
                <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem;">🗂️ Arsitektur Admin Sidebar &amp; Relasi Data</h3>
                <div class="architecture-grid">
                    <div class="architecture-step">
                        <strong>1. Sidebar Layout (<code>admin.php</code>)</strong>
                        <span>Sidebar kiri menampilkan menu Overview, Kategori, Product Catalog, Tambah Produk, shortcut Storefront, dan profil admin.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>2. Admin Dashboard</strong>
                        <span><code>AdminDashboardController</code> menghitung nilai stok inventaris, total produk aktif, dan kategori populer secara real-time.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>3. CRUD Kategori</strong>
                        <span>Auto-slug via <code>url_title()</code>, validasi nama unik, dan proteksi hapus bila kategori masih memiliki produk.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>4. CRUD Produk + Upload</strong>
                        <span>Query <code>JOIN</code> ke kategori, validasi MIME (JPG/PNG/WEBP, maks 2 MB), dan penyimpanan acak di <code>public/uploads/products/</code>.</span>
                    </div>
                </div>
            </div>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>📊 Overview &amp; Catalog</h4>
                    <p>Menampilkan 4 kartu statistik (Nilai Inventaris Stok, Katalog Produk, Produk Aktif, Kategori &amp; Akun), shortcut cepat, tabel produk terbaru, dan kategori populer.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🔗 Relasi Foreign Key Aman</h4>
                    <p>Tabel <code>products.category_id</code> terhubung ke <code>categories.id</code> dengan <code>ON DELETE RESTRICT</code> dan dicek oleh <code>CategoryController::delete()</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🖼️ Manajemen Upload Gambar</h4>
                    <p>Saat produk diubah dengan gambar baru atau dihapus, file gambar lama di <code>public/uploads/products/</code> otomatis dibersihkan.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🛡️ CSRF &amp; Validasi Server</h4>
                    <p>Seluruh form tambah, edit, dan hapus dilindungi token <code>csrf_field()</code> serta validasi server-side CodeIgniter 4.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Source Code Lengkap -->
            <h2>2. Source Code Lengkap (Pertemuan 12 – Admin Layout, Dashboard &amp; CRUD)</h2>

            <h3>A. Models: <code>CategoryModel.php</code> &amp; <code>ProductModel.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeModels12')">Copy Code</button>
                <pre><code id="codeModels12">// ===== app/Models/CategoryModel.php =====
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

            <h3>B. Dashboard Controller: <code>app/Controllers/AdminDashboardController.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeDash12')">Copy Code</button>
                <pre><code id="codeDash12">&lt;?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class AdminDashboardController extends BaseController
{
    public function index(): string
    {
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();
        $userModel     = new UserModel();

        $totalCategories = $categoryModel-&gt;countAllResults();
        $totalProducts   = $productModel-&gt;countAllResults();
        $activeProducts  = $productModel-&gt;where('status', 'active')-&gt;countAllResults();
        $totalUsers      = $userModel-&gt;countAllResults();

        $allProducts = $productModel
            -&gt;select('products.*, categories.name AS category_name')
            -&gt;join('categories', 'categories.id = products.category_id')
            -&gt;orderBy('products.id', 'DESC')
            -&gt;findAll();

        $inventoryValue = 0.0;
        $totalStock     = 0;
        foreach ($allProducts as $p) {
            $inventoryValue += (float) $p['price'] * (int) $p['stock'];
            $totalStock     += (int) $p['stock'];
        }

        $categories = $categoryModel
            -&gt;select('categories.*, COUNT(products.id) AS product_count')
            -&gt;join('products', 'products.category_id = categories.id', 'left')
            -&gt;groupBy('categories.id')
            -&gt;orderBy('product_count', 'DESC')
            -&gt;findAll();

        return view('admin/dashboard', [
            'title'           =&gt; 'Overview &amp; Catalog – Admin ShopEase',
            'pageHeader'      =&gt; 'OVERVIEW &amp; CATALOG',
            'active'          =&gt; 'dashboard',
            'totalCategories' =&gt; $totalCategories,
            'totalProducts'   =&gt; $totalProducts,
            'activeProducts'  =&gt; $activeProducts,
            'totalUsers'      =&gt; $totalUsers,
            'totalStock'      =&gt; $totalStock,
            'inventoryValue'  =&gt; $inventoryValue,
            'recentProducts'  =&gt; array_slice($allProducts, 0, 6),
            'categories'      =&gt; $categories,
        ]);
    }
}</code></pre>
            </div>

            <h3>C. CRUD Kategori: <code>app/Controllers/CategoryController.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeCat12')">Copy Code</button>
                <pre><code id="codeCat12">&lt;?php

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
            'pageHeader' =&gt; 'KATEGORI PRODUK',
            'active'     =&gt; 'categories',
            'categories' =&gt; $categories,
        ]);
    }

    public function create(): string
    {
        return view('admin/categories/create', [
            'title'      =&gt; 'Tambah Kategori – Admin ShopEase',
            'pageHeader' =&gt; 'TAMBAH KATEGORI',
            'active'     =&gt; 'categories_create',
        ]);
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
            'title'      =&gt; 'Edit Kategori – Admin ShopEase',
            'pageHeader' =&gt; 'EDIT KATEGORI',
            'active'     =&gt; 'categories',
            'category'   =&gt; $category,
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
}</code></pre>
            </div>

            <h3>D. CRUD Produk &amp; Upload Gambar: <code>app/Controllers/ProductController.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeProd12')">Copy Code</button>
                <pre><code id="codeProd12">&lt;?php

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
            'title'      =&gt; 'Manajemen Produk – Admin ShopEase',
            'pageHeader' =&gt; 'PRODUCT CATALOG',
            'active'     =&gt; 'products',
            'products'   => $products,
        ]);
    }

    public function create(): string
    {
        return view('admin/products/create', [
            'title'      =&gt; 'Tambah Produk – Admin ShopEase',
            'pageHeader' =&gt; 'TAMBAH PRODUK BARU',
            'active'     =&gt; 'products_create',
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
            'pageHeader' =&gt; 'EDIT PRODUK',
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

            <h3>E. Layout Sidebar Admin: <code>app/Views/layouts/admin.php</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeLayout12')">Copy Code</button>
                <pre><code id="codeLayout12">&lt;div class="admin-shell"&gt;
    &lt;aside class="admin-sidebar"&gt;
        &lt;div class="admin-sidebar-brand"&gt;
            &lt;div class="admin-brand-title"&gt;SHOPEASE.&lt;/div&gt;
            &lt;div class="admin-brand-sub"&gt;Admin Terminal&lt;/div&gt;
        &lt;/div&gt;
        &lt;nav class="admin-sidebar-nav"&gt;
            &lt;div class="admin-nav-section"&gt;Ringkasan&lt;/div&gt;
            &lt;a href="/admin/dashboard" class="admin-nav-item &lt;?= $active === 'dashboard' ? 'active' : '' ?&gt;"&gt;
                &lt;span class="admin-nav-left"&gt;&lt;i class="bi bi-grid-1x2-fill"&gt;&lt;/i&gt; Overview &amp;amp; Catalog&lt;/span&gt;
            &lt;/a&gt;
            &lt;div class="admin-nav-section"&gt;Manajemen Toko&lt;/div&gt;
            &lt;a href="/admin/categories" class="admin-nav-item &lt;?= $active === 'categories' ? 'active' : '' ?&gt;"&gt;
                &lt;span class="admin-nav-left"&gt;&lt;i class="bi bi-tags-fill"&gt;&lt;/i&gt; Kategori Produk&lt;/span&gt;
                &lt;span class="admin-nav-count"&gt;&lt;?= $catCountBadge ?&gt;&lt;/span&gt;
            &lt;/a&gt;
            &lt;a href="/admin/products" class="admin-nav-item &lt;?= $active === 'products' ? 'active' : '' ?&gt;"&gt;
                &lt;span class="admin-nav-left"&gt;&lt;i class="bi bi-box-seam-fill"&gt;&lt;/i&gt; Product Catalog&lt;/span&gt;
                &lt;span class="admin-nav-count"&gt;&lt;?= $prodCountBadge ?&gt;&lt;/span&gt;
            &lt;/a&gt;
            &lt;a href="/admin/products/create" class="admin-nav-item &lt;?= $active === 'products_create' ? 'active' : '' ?&gt;"&gt;
                &lt;span class="admin-nav-left"&gt;&lt;i class="bi bi-plus-square-fill"&gt;&lt;/i&gt; Tambah Produk&lt;/span&gt;
            &lt;/a&gt;
        &lt;/nav&gt;
        &lt;div class="admin-sidebar-footer"&gt;
            &lt;a href="/" class="admin-store-btn"&gt;&lt;i class="bi bi-box-arrow-up-right"&gt;&lt;/i&gt; View Storefront&lt;/a&gt;
            &lt;!-- Profil Admin &amp; Logout --&gt;
        &lt;/div&gt;
    &lt;/aside&gt;

    &lt;div class="admin-main"&gt;
        &lt;header class="admin-topbar"&gt;
            &lt;div class="admin-topbar-title"&gt;&lt;?= esc($pageHeader) ?&gt; &lt;span&gt;/ shopease.local&lt;/span&gt;&lt;/div&gt;
            &lt;div class="d-flex align-items-center gap-2"&gt;
                &lt;a href="/" class="btn btn-dark btn-sm fw-semibold px-3"&gt;STORE&lt;/a&gt;
                &lt;a href="/logout" class="btn btn-outline-danger btn-sm fw-semibold px-3"&gt;LOGOUT&lt;/a&gt;
            &lt;/div&gt;
        &lt;/header&gt;
        &lt;main class="admin-content"&gt;
            &lt;?= $this-&gt;include('partials/alerts') ?&gt;
            &lt;?= $this-&gt;renderSection('content') ?&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>

            <hr>

            <!-- 3. Tabel Pengujian -->
            <h2>3. Tabel Pengujian CRUD Kategori &amp; Produk</h2>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Skenario Pengujian</th>
                        <th>Aksi Admin</th>
                        <th>Hasil yang Diharapkan</th>
                        <th style="width: 110px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Overview &amp; Catalog Dashboard</td>
                        <td>Login admin &rarr; masuk ke <code>/admin/dashboard</code></td>
                        <td>Sidebar kiri aktif, 4 kartu statistik inventaris tampil, tabel produk terbaru dan kategori populer termuat.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tambah &amp; Edit Kategori</td>
                        <td>Isi nama kategori baru &rarr; <code>POST /admin/categories/store</code></td>
                        <td>Kategori tersimpan ke MariaDB dengan slug otomatis dan tampil di sidebar &amp; tabel.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Hapus Kategori Berelasi</td>
                        <td>Klik Hapus pada kategori <code>Elektronik</code> yang masih punya produk</td>
                        <td>Penghapusan ditolak dengan pesan aman karena masih direferensikan oleh produk.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Tambah Produk + Upload Gambar</td>
                        <td>Isi form produk &amp; unggah gambar PNG ke <code>/admin/products/store</code></td>
                        <td>File gambar tervalidasi MIME &amp; ukuran, tersimpan di <code>public/uploads/products/</code>, dan muncul di katalog.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Edit &amp; Hapus Produk</td>
                        <td>Perbarui data atau hapus produk via <code>/admin/products/delete</code></td>
                        <td>Perubahan tersinkron di MariaDB dan file gambar lama terhapus otomatis saat diganti/dihapus.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 4. Screenshot -->
            <h2>4. Tangkapan Layar Admin Terminal &amp; CRUD</h2>
            <p>Berikut adalah tampilan panel admin bergaya sidebar kiri di atas aplikasi ShopEase yang berjalan langsung. Klik gambar untuk memperbesar:</p>

            <div id="screenshot-container">
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m12-dashboard.png" alt="Admin Dashboard Overview ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 1: Admin Dashboard (/admin/dashboard) dengan Sidebar Navigasi di kiri, 4 Kartu Statistik, Tabel Produk Terbaru, dan Kategori Populer di kanan.</p>
                </div>
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m12-categories.png" alt="Admin Manajemen Kategori ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 2: Halaman Manajemen Kategori (/admin/categories) di dalam workspace admin sidebar.</p>
                </div>
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m12-products.png" alt="Admin Product Catalog ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 3: Halaman Product Catalog (/admin/products) menampilkan seluruh produk, kategori, harga, dan stok.</p>
                </div>
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m12-product-create.png" alt="Form Tambah Produk ShopEase" onclick="openModal(this)">
                    <p class="caption">Gambar 4: Halaman Form Tambah Produk Baru (/admin/products/create) beserta pilihan kategori dan upload gambar.</p>
                </div>
            </div>

            <hr>

            <!-- 5. Q&A -->
            <h2>5. Pertanyaan Pemahaman Konsep CRUD &amp; Upload</h2>
            <div class="qa-box">
                <h4>Q1: Mengapa <code>ProductController::index()</code> menggunakan <code>join('categories', ...)</code>?</h4>
                <p><strong>Jawaban:</strong> Tabel <code>products</code> hanya menyimpan angka foreign key <code>category_id</code>. Dengan melakukan <code>JOIN</code> ke tabel <code>categories</code>, kita dapat langsung menampilkan nama kategori (<code>category_name</code>) di tabel katalog tanpa melakukan query berulang (menghindari masalah <em>N+1 Query</em>).</p>
            </div>
            <div class="qa-box">
                <h4>Q2: Mengapa penghapusan kategori yang masih memiliki produk perlu dibatasi?</h4>
                <p><strong>Jawaban:</strong> Agar tidak terjadi data yatim (<em>orphan records</em>) pada tabel <code>products</code> dan tetap mematuhi constraint foreign key <code>ON DELETE RESTRICT</code> di MariaDB.</p>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 12 &bull; <a href="https://github.com/YOGA3321/tugas-pweb---pbo" target="_blank" rel="noopener noreferrer">GitHub Repository</a> &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
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
