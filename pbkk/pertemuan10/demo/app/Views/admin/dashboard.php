<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Alert Info Status Admin -->
<div class="alert alert-warning border-warning-subtle d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4" style="border-radius: 12px;">
    <div class="d-flex align-items-center gap-2 small">
        <i class="bi bi-shield-lock-fill fs-5 text-warning"></i>
        <div>
            <strong>STATUS SISTEM ADMIN: TERKONEKSI KE MARIADB (PORT 3305)</strong><br>
            <span class="text-muted">Sesi aktif sebagai <strong><?= esc(session()->get('name')) ?></strong> (role: <code><?= esc(session()->get('role')) ?></code>). Gunakan menu sidebar di kiri untuk mengelola kategori dan katalog produk.</span>
        </div>
    </div>
    <a href="/admin/products/create" class="btn btn-warning btn-sm fw-bold text-dark">
        + Tambah Produk Baru &rarr;
    </a>
</div>

<!-- Header Section -->
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="h4 fw-bold mb-1" style="letter-spacing: -0.02em;">STORE PERFORMANCE &amp; CATALOG OVERVIEW</h1>
        <p class="text-muted small mb-0">Pusat kontrol kategori, stok produk, dan nilai inventaris toko online ShopEase.</p>
    </div>
    <a href="/admin/products/create" class="btn btn-dark fw-bold px-3">
        <i class="bi bi-plus-lg me-1"></i> TAMBAH PRODUK
    </a>
</div>

<!-- 4 Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <span class="admin-stat-label">Nilai Inventaris Stok</span>
                <div class="admin-stat-icon bg-success-subtle text-success"><i class="bi bi-currency-dollar"></i></div>
            </div>
            <div class="admin-stat-value">Rp <?= number_format($inventoryValue, 0, ',', '.') ?></div>
            <div class="small text-success fw-semibold">&bull; <?= number_format($totalStock) ?> unit total stok</div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <span class="admin-stat-label">Katalog Produk</span>
                <div class="admin-stat-icon bg-primary-subtle text-primary"><i class="bi bi-box-seam"></i></div>
            </div>
            <div class="admin-stat-value"><?= $totalProducts ?></div>
            <a href="/admin/products" class="small text-primary text-decoration-none fw-semibold">Kelola semua produk &#8599;</a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <span class="admin-stat-label">Produk Aktif</span>
                <div class="admin-stat-icon bg-warning-subtle text-warning"><i class="bi bi-check2-circle"></i></div>
            </div>
            <div class="admin-stat-value"><?= $activeProducts ?></div>
            <div class="small text-warning-emphasis fw-semibold">Tampil di etalase toko</div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <span class="admin-stat-label">Kategori &amp; Akun</span>
                <div class="admin-stat-icon bg-danger-subtle text-danger"><i class="bi bi-tags"></i></div>
            </div>
            <div class="admin-stat-value"><?= $totalCategories ?> <span class="fs-6 fw-normal text-muted">kategori</span></div>
            <a href="/admin/categories" class="small text-danger text-decoration-none fw-semibold">Kelola kategori (<?= $totalUsers ?> user) &#8599;</a>
        </div>
    </div>
</div>

<!-- Quick Shortcuts -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <a href="/admin/categories" class="text-decoration-none">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="admin-stat-icon bg-light text-dark border"><i class="bi bi-tags-fill"></i></div>
                    <div>
                        <div class="fw-bold text-dark small">MANAJEMEN KATEGORI</div>
                        <div class="text-muted" style="font-size: 0.78rem;"><?= $totalCategories ?> kategori terdaftar</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-muted"></i>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="/admin/products" class="text-decoration-none">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="admin-stat-icon bg-light text-dark border"><i class="bi bi-box2-fill"></i></div>
                    <div>
                        <div class="fw-bold text-dark small">MANAJEMEN PRODUK</div>
                        <div class="text-muted" style="font-size: 0.78rem;"><?= $totalProducts ?> produk di katalog</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-muted"></i>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="/admin/products/create" class="text-decoration-none">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="admin-stat-icon bg-light text-dark border"><i class="bi bi-cloud-arrow-up-fill"></i></div>
                    <div>
                        <div class="fw-bold text-dark small">UPLOAD PRODUK BARU</div>
                        <div class="text-muted" style="font-size: 0.78rem;">Tambah item &amp; foto produk</div>
                    </div>
                </div>
                <i class="bi bi-chevron-right text-muted"></i>
            </div>
        </a>
    </div>
</div>

<!-- Bottom Split: Produk Terbaru (Kiri) + Distribusi Kategori (Kanan) -->
<div class="row g-3">
    <div class="col-lg-8">
        <div class="admin-panel h-100">
            <div class="admin-panel-header">
                <div class="fw-bold small"><i class="bi bi-bag-check me-2"></i>PRODUK TERBARU DI KATALOG</div>
                <a href="/admin/products" class="small text-decoration-none fw-semibold">Kelola Semua &rarr;</a>
            </div>
            <div class="table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentProducts as $p): ?>
                            <tr>
                                <td class="fw-semibold"><?= esc($p['name']) ?></td>
                                <td><span class="badge bg-light text-dark border"><?= esc($p['category_name']) ?></span></td>
                                <td class="fw-semibold">Rp <?= number_format((float) $p['price'], 0, ',', '.') ?></td>
                                <td><?= (int) $p['stock'] ?> pcs</td>
                                <td>
                                    <?php if ($p['status'] === 'active'): ?>
                                        <span class="badge bg-success-subtle text-success">ACTIVE</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary-subtle text-secondary">INACTIVE</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="/admin/products/edit/<?= (int) $p['id'] ?>" class="text-muted" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-panel h-100">
            <div class="admin-panel-header">
                <div class="fw-bold small"><i class="bi bi-bar-chart-line me-2"></i>KATEGORI POPULER</div>
                <a href="/admin/categories" class="small text-decoration-none fw-semibold">Kategori &rarr;</a>
            </div>
            <div class="p-3 d-flex flex-column gap-3">
                <?php foreach ($categories as $cat): ?>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded border bg-light-subtle">
                        <div>
                            <div class="fw-bold small text-dark"><?= esc($cat['name']) ?></div>
                            <div class="text-muted" style="font-size: 0.75rem;">slug: <code><?= esc($cat['slug']) ?></code></div>
                        </div>
                        <span class="badge bg-dark"><?= (int) $cat['product_count'] ?> produk</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
