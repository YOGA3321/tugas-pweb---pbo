<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="bg-white border rounded-4 p-4 p-md-5 shadow-sm mb-4">
    <span class="badge bg-primary-subtle text-primary mb-2">Tentang ShopEase</span>
    <h1 class="h2 fw-bold mb-3">Belanja Online Modern dengan Arsitektur MVC CodeIgniter 4</h1>
    <p class="text-muted fs-6 mb-4" style="max-width: 760px;">
        <strong>ShopEase</strong> adalah platform e-commerce yang dirancang untuk memudahkan pelanggan menjelajahi produk sekaligus membantu administrator mengelola kategori, stok, harga, dan foto produk secara terstruktur.
    </p>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="p-4 bg-light border rounded-4 h-100">
                <div class="se-cat-icon bg-primary-subtle text-primary mb-3"><i class="bi bi-compass"></i></div>
                <h6 class="fw-bold">Routing &amp; MVC Bersih</h6>
                <p class="small text-muted mb-0">Pemisahan logika di Controller, query database di Model, dan tampilan responsif di View.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light border rounded-4 h-100">
                <div class="se-cat-icon bg-success-subtle text-success mb-3"><i class="bi bi-shield-check"></i></div>
                <h6 class="fw-bold">Autentikasi &amp; RBAC</h6>
                <p class="small text-muted mb-0">Password hashing dengan <code>password_hash()</code> dan proteksi halaman admin menggunakan <code>AuthFilter</code>.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light border rounded-4 h-100">
                <div class="se-cat-icon bg-warning-subtle text-warning mb-3"><i class="bi bi-box-seam"></i></div>
                <h6 class="fw-bold">CRUD &amp; Upload Aman</h6>
                <p class="small text-muted mb-0">Manajemen kategori berelasi dan katalog produk lengkap dengan validasi gambar MIME &amp; ukuran file.</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
