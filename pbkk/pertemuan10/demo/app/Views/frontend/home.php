<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section Standar -->
<section class="p-4 p-md-5 mb-4 bg-white border rounded-3 shadow-sm">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <span class="badge bg-primary-subtle text-primary mb-2">ShopEase Online Store</span>
            <h1 class="display-6 fw-bold text-dark">Selamat Datang di ShopEase</h1>
            <p class="lead text-muted mb-3">
                Aplikasi toko online berbasis CodeIgniter 4 dan MariaDB. Jelajahi kategori, lihat produk terbaru, atau login sebagai admin untuk mengelola kategori dan produk.
            </p>
            <div class="d-flex flex-wrap gap-2">
                <a href="#daftar-produk" class="btn btn-primary">Lihat Produk</a>
                <?php if (session()->get('role') === 'admin'): ?>
                    <a href="/admin/products" class="btn btn-outline-primary">Kelola Produk (Admin)</a>
                    <a href="/admin/categories" class="btn btn-outline-secondary">Kelola Kategori</a>
                <?php elseif (! session()->get('logged_in')): ?>
                    <a href="/login" class="btn btn-outline-secondary">Login Akun</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0 text-center text-lg-end">
            <div class="p-4 bg-light border rounded-3">
                <div class="fs-1 text-primary mb-1"><i class="bi bi-shop"></i></div>
                <div class="fw-semibold">Total Produk Aktif: <?= count($products) ?></div>
                <div class="small text-muted">Total Kategori: <?= count($categories) ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Kategori Produk -->
<section class="mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Kategori Produk</h2>
        <?php if (! empty($selectedSlug)): ?>
            <a href="/" class="btn btn-sm btn-outline-secondary">Tampilkan Semua</a>
        <?php endif; ?>
    </div>
    <div class="row g-3">
        <?php foreach ($categories as $cat): ?>
            <?php $isSelected = ($selectedSlug === $cat['slug']); ?>
            <div class="col-md-4">
                <a href="/?category=<?= urlencode((string) $cat['slug']) ?>" class="text-decoration-none">
                    <div class="card h-100 <?= $isSelected ? 'border-primary shadow-sm' : '' ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h5 class="card-title mb-0 text-dark"><?= esc($cat['name']) ?></h5>
                                <span class="badge bg-light text-secondary border"><?= esc($cat['slug']) ?></span>
                            </div>
                            <p class="card-text small text-muted mb-0">
                                <?= esc($cat['description'] ?: 'Lihat produk dalam kategori ini.') ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Daftar Produk -->
<section id="daftar-produk">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">
            Produk Terbaru<?= ! empty($selectedSlug) ? ' (' . esc($selectedSlug) . ')' : '' ?>
        </h2>
        <span class="text-muted small"><?= count($products) ?> produk tersedia</span>
    </div>

    <?php if ($products === []): ?>
        <div class="alert alert-info">Belum ada produk aktif untuk kategori ini.</div>
    <?php else: ?>
        <div class="row g-3">
            <?php foreach ($products as $p): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <?php if (! empty($p['image']) && is_file(FCPATH . 'uploads/products/' . $p['image'])): ?>
                            <img src="/uploads/products/<?= esc($p['image']) ?>"
                                 class="card-img-top product-thumb"
                                 alt="<?= esc($p['name']) ?>">
                        <?php else: ?>
                            <div class="product-placeholder d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-image fs-1"></i>
                                <span class="small mt-1"><?= esc($p['category_name']) ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-secondary-subtle text-secondary align-self-start mb-2">
                                <?= esc($p['category_name']) ?>
                            </span>
                            <h6 class="card-title fw-bold mb-1"><?= esc($p['name']) ?></h6>
                            <p class="card-text small text-muted flex-grow-1">
                                <?= esc($p['description'] ?: 'Produk unggulan ShopEase.') ?>
                            </p>
                            <div class="mt-2 pt-2 border-top d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">
                                    Rp <?= number_format((float) $p['price'], 0, ',', '.') ?>
                                </span>
                                <span class="small text-muted">Stok: <?= (int) $p['stock'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?= $this->endSection() ?>
