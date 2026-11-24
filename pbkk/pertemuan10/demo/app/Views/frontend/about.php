<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="bg-white border rounded-3 p-4 p-md-5 shadow-sm">
    <h1 class="h3 fw-bold mb-3">Tentang ShopEase</h1>
    <p class="text-muted">
        <strong>ShopEase</strong> adalah aplikasi toko online berbasis web yang dibangun menggunakan framework <strong>CodeIgniter 4</strong> dan database <strong>MariaDB</strong> dengan pola arsitektur <strong>Model–View–Controller (MVC)</strong>.
    </p>
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <div class="p-3 bg-light border rounded-3 h-100">
                <h6 class="fw-bold"><i class="bi bi-shield-check text-primary me-1"></i> Autentikasi &amp; Role</h6>
                <p class="small text-muted mb-0">Login dan registrasi dengan hashing password standar PHP serta proteksi route berbasis <code>AuthFilter</code>.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 bg-light border rounded-3 h-100">
                <h6 class="fw-bold"><i class="bi bi-tags text-primary me-1"></i> Manajemen Kategori</h6>
                <p class="small text-muted mb-0">Pengelolaan kategori lengkap dengan slug otomatis dan pengecekan relasi produk sebelum penghapusan.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 bg-light border rounded-3 h-100">
                <h6 class="fw-bold"><i class="bi bi-box-seam text-primary me-1"></i> Manajemen Produk</h6>
                <p class="small text-muted mb-0">CRUD produk terhubung ke kategori serta fitur upload gambar dengan validasi MIME type dan ukuran file.</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
