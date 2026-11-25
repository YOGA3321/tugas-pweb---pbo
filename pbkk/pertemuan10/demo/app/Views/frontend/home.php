<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- 1. HERO SECTION MODERN -->
<section class="se-hero mb-4">
    <div class="row align-items-center g-4 position-relative" style="z-index: 2;">
        <div class="col-lg-7">
            <div class="se-hero-pill">
                <i class="bi bi-stars text-warning"></i>
                Koleksi Terbaru &bull; Garansi Produk Original
            </div>
            <h1>Belanja Lebih Mudah, <span>Pilihan Lengkap</span> Setiap Hari.</h1>
            <p class="se-hero-lead mb-4">
                Temukan perangkat elektronik, fashion kasual, dan aksesoris berkualitas di ShopEase. Pesan dengan nyaman, status transaksi terpantau rapi, dan pengelolaan katalog terintegrasi.
            </p>
            <div class="d-flex flex-wrap gap-2 mb-4">
                <a href="#daftar-produk" class="btn btn-light fw-bold px-4 py-2 text-dark">
                    <i class="bi bi-grid me-1"></i> Jelajahi Produk
                </a>
                <a href="/about" class="btn btn-outline-light fw-semibold px-4 py-2">
                    Tentang ShopEase
                </a>
                <?php if (session()->get('role') === 'admin'): ?>
                    <a href="/admin/dashboard" class="btn btn-warning fw-bold px-4 py-2 text-dark">
                        <i class="bi bi-speedometer2 me-1"></i> Buka Admin Panel
                    </a>
                <?php endif; ?>
            </div>
            <div class="d-flex flex-wrap gap-4 small" style="color: rgba(226, 232, 240, 0.85);">
                <span><i class="bi bi-shield-check text-info me-1"></i> Pembayaran Terverifikasi</span>
                <span><i class="bi bi-truck text-info me-1"></i> Pengiriman Terpantau</span>
                <span><i class="bi bi-award text-info me-1"></i> Kualitas Terjamin</span>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="se-hero-showcase">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="small fw-bold text-uppercase" style="letter-spacing: 0.08em; color: #a5b4fc;">Ringkasan Etalase</span>
                    <span class="badge bg-success-subtle text-success">Live MariaDB</span>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <div class="se-mini-metric">
                            <div class="small" style="color: #cbd5e1;">Produk Aktif</div>
                            <div class="fs-3 fw-bold text-white"><?= count($products) ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="se-mini-metric">
                            <div class="small" style="color: #cbd5e1;">Kategori</div>
                            <div class="fs-3 fw-bold text-white"><?= count($categories) ?></div>
                        </div>
                    </div>
                </div>
                <div class="se-mini-metric d-flex align-items-center gap-3">
                    <div class="se-cat-icon bg-primary text-white flex-shrink-0" style="width: 42px; height: 42px; font-size: 1.1rem;">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-white small">Promo Pilihan Minggu Ini</div>
                        <div style="font-size: 0.78rem; color: #cbd5e1;">Gratis konsultasi produk &amp; stok real-time dari database.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. TRUST STRIP -->
<section class="se-trust-strip mb-5">
    <div class="row g-3 text-center text-md-start align-items-center">
        <div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-start gap-3">
            <div class="se-cat-icon bg-primary-subtle text-primary"><i class="bi bi-shield-lock"></i></div>
            <div>
                <div class="fw-bold small">Transaksi Aman &amp; Terproteksi</div>
                <div class="text-muted" style="font-size: 0.8rem;">Proteksi CSRF &amp; validasi server-side</div>
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-start gap-3">
            <div class="se-cat-icon bg-success-subtle text-success"><i class="bi bi-box-seam"></i></div>
            <div>
                <div class="fw-bold small">Stok Selalu Terupdate</div>
                <div class="text-muted" style="font-size: 0.8rem;">Tersinkron langsung dengan MariaDB</div>
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-start gap-3">
            <div class="se-cat-icon bg-warning-subtle text-warning"><i class="bi bi-headset"></i></div>
            <div>
                <div class="fw-bold small">Layanan Bantuan Cepat</div>
                <div class="text-muted" style="font-size: 0.8rem;">Hubungi kami kapan saja lewat halaman Kontak</div>
            </div>
        </div>
    </div>
</section>

<!-- 3. KATEGORI PRODUK -->
<section class="mb-5">
    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
        <div>
            <span class="text-primary fw-bold text-uppercase" style="font-size: 0.76rem; letter-spacing: 0.08em;">Jelajahi</span>
            <h2 class="h4 fw-bold mb-0">Kategori Produk Pilihan</h2>
        </div>
        <?php if (! empty($selectedSlug)): ?>
            <a href="/" class="btn btn-sm btn-outline-dark fw-semibold">Tampilkan Semua Kategori</a>
        <?php endif; ?>
    </div>

    <div class="row g-3">
        <?php
        $catStyles = [
            'elektronik' => ['bg' => 'bg-primary-subtle text-primary', 'icon' => 'bi-laptop'],
            'fashion'    => ['bg' => 'bg-danger-subtle text-danger', 'icon' => 'bi-bag-heart'],
            'aksesoris'  => ['bg' => 'bg-success-subtle text-success', 'icon' => 'bi-smartwatch'],
        ];
        ?>
        <?php foreach ($categories as $cat): ?>
            <?php
            $slug       = (string) ($cat['slug'] ?? '');
            $isSelected = ($selectedSlug === $slug);
            $style      = $catStyles[$slug] ?? ['bg' => 'bg-secondary-subtle text-secondary', 'icon' => 'bi-tag'];
            ?>
            <div class="col-md-4">
                <a href="/?category=<?= urlencode($slug) ?>#daftar-produk" class="text-decoration-none">
                    <div class="se-cat-card <?= $isSelected ? 'active' : '' ?>">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="se-cat-icon <?= $style['bg'] ?>">
                                <i class="bi <?= $style['icon'] ?>"></i>
                            </div>
                            <span class="badge bg-light text-secondary border"><?= esc($slug) ?></span>
                        </div>
                        <h5 class="fw-bold text-dark mb-1"><?= esc($cat['name']) ?></h5>
                        <p class="small text-muted mb-0">
                            <?= esc($cat['description'] ?: 'Lihat seluruh koleksi dalam kategori ini.') ?>
                        </p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- 4. PRODUK TERBARU -->
<section id="daftar-produk" class="mb-5">
    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
        <div>
            <span class="text-primary fw-bold text-uppercase" style="font-size: 0.76rem; letter-spacing: 0.08em;">Katalog Unggulan</span>
            <h2 class="h4 fw-bold mb-0">
                Produk Terbaru<?= ! empty($selectedSlug) ? ' &mdash; ' . esc(ucfirst($selectedSlug)) : '' ?>
            </h2>
        </div>
        <span class="badge bg-dark-subtle text-dark px-3 py-2"><?= count($products) ?> produk tersedia</span>
    </div>

    <?php if ($products === []): ?>
        <div class="alert alert-info">Belum ada produk aktif untuk kategori ini.</div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($products as $p): ?>
                <?php
                $cSlug = strtolower((string) ($p['category_slug'] ?? 'default'));
                $artClass = match ($cSlug) {
                    'elektronik' => 'se-art-elektronik',
                    'fashion'    => 'se-art-fashion',
                    'aksesoris'  => 'se-art-aksesoris',
                    default      => 'se-art-default',
                };
                $artIcon = match ($cSlug) {
                    'elektronik' => 'bi-headphones',
                    'fashion'    => 'bi-bag-check',
                    'aksesoris'  => 'bi-smartwatch',
                    default      => 'bi-box-seam',
                };
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="se-product-card">
                        <div class="se-product-media">
                            <?php if (! empty($p['image']) && is_file(FCPATH . 'uploads/products/' . $p['image'])): ?>
                                <img src="/uploads/products/<?= esc($p['image']) ?>" alt="<?= esc($p['name']) ?>">
                            <?php else: ?>
                                <div class="se-product-art <?= $artClass ?>">
                                    <i class="bi <?= $artIcon ?>" style="font-size: 2.6rem;"></i>
                                    <span class="small fw-semibold"><?= esc($p['category_name']) ?></span>
                                </div>
                            <?php endif; ?>
                            <span class="se-stock-badge">Stok: <?= (int) $p['stock'] ?></span>
                        </div>

                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-light text-secondary border align-self-start mb-2">
                                <?= esc($p['category_name']) ?>
                            </span>
                            <h6 class="fw-bold text-dark mb-1"><?= esc($p['name']) ?></h6>
                            <p class="small text-muted flex-grow-1 mb-3">
                                <?= esc($p['description'] ?: 'Produk pilihan berkualitas tinggi dari ShopEase.') ?>
                            </p>
                            <div class="pt-2 border-top d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-6">
                                    Rp <?= number_format((float) $p['price'], 0, ',', '.') ?>
                                </span>
                                <span class="badge bg-success-subtle text-success">Ready</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<!-- 5. CTA BANNER -->
<section class="se-cta-banner">
    <div class="row align-items-center g-3">
        <div class="col-lg-8">
            <h3 class="h4 fw-bold text-dark mb-1">Butuh bantuan memilih produk atau ingin bergabung?</h3>
            <p class="text-muted mb-0">
                Daftar akun sekarang atau kirimkan pertanyaan Anda melalui halaman Kontak kami. Tim ShopEase siap membantu di jam kerja.
            </p>
        </div>
        <div class="col-lg-4 text-lg-end d-flex flex-wrap gap-2 justify-content-lg-end">
            <a href="/contact" class="btn btn-dark fw-semibold px-4">Hubungi Kami</a>
            <?php if (! session()->get('logged_in')): ?>
                <a href="/register" class="btn btn-outline-primary fw-semibold px-4">Daftar Akun</a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
