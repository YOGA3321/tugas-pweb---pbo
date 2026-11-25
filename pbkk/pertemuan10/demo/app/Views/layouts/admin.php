<?php
$active          = $active ?? '';
$pageHeader      = $pageHeader ?? 'ADMIN TERMINAL';
$userName        = (string) (session()->get('name') ?? 'Administrator');
$userEmail       = (string) (session()->get('email') ?? 'admin@shopease.test');
$initials        = strtoupper(substr($userName, 0, 2));
$catCountBadge   = (new \App\Models\CategoryModel())->countAllResults();
$prodCountBadge  = (new \App\Models\ProductModel())->countAllResults();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel – ShopEase') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/css/shopease.css" rel="stylesheet">
</head>
<body>

<div class="admin-shell">
    <!-- LEFT FIXED SIDEBAR -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-brand">
            <div class="admin-brand-title">SHOPEASE.</div>
            <div class="admin-brand-sub">Admin Terminal</div>
        </div>

        <nav class="admin-sidebar-nav">
            <div class="admin-nav-section">Ringkasan</div>
            <a href="/admin/dashboard" class="admin-nav-item <?= $active === 'dashboard' ? 'active' : '' ?>">
                <span class="admin-nav-left">
                    <i class="bi bi-grid-1x2-fill"></i> Overview &amp; Catalog
                </span>
            </a>

            <div class="admin-nav-section">Manajemen Toko</div>
            <a href="/admin/categories" class="admin-nav-item <?= $active === 'categories' ? 'active' : '' ?>">
                <span class="admin-nav-left">
                    <i class="bi bi-tags-fill"></i> Kategori Produk
                </span>
                <span class="admin-nav-count"><?= $catCountBadge ?></span>
            </a>

            <a href="/admin/products" class="admin-nav-item <?= $active === 'products' ? 'active' : '' ?>">
                <span class="admin-nav-left">
                    <i class="bi bi-box-seam-fill"></i> Product Catalog
                </span>
                <span class="admin-nav-count"><?= $prodCountBadge ?></span>
            </a>

            <a href="/admin/products/create" class="admin-nav-item <?= $active === 'products_create' ? 'active' : '' ?>">
                <span class="admin-nav-left">
                    <i class="bi bi-plus-square-fill"></i> Tambah Produk
                </span>
            </a>

            <a href="/admin/categories/create" class="admin-nav-item <?= $active === 'categories_create' ? 'active' : '' ?>">
                <span class="admin-nav-left">
                    <i class="bi bi-folder-plus"></i> Tambah Kategori
                </span>
            </a>

            <div class="admin-nav-section">Halaman Publik</div>
            <a href="/" class="admin-nav-item">
                <span class="admin-nav-left">
                    <i class="bi bi-shop-window"></i> Storefront Homepage
                </span>
            </a>
            <a href="/about" class="admin-nav-item">
                <span class="admin-nav-left">
                    <i class="bi bi-info-circle"></i> Tentang Kami
                </span>
            </a>
        </nav>

        <div class="admin-sidebar-footer">
            <a href="/" class="admin-store-btn">
                <i class="bi bi-box-arrow-up-right"></i> View Storefront
            </a>
            <div class="admin-user-box">
                <div class="d-flex align-items-center gap-2 overflow-hidden">
                    <div class="admin-user-avatar"><?= esc($initials) ?></div>
                    <div class="overflow-hidden">
                        <div class="fw-bold text-dark text-truncate" style="font-size: 0.8rem;"><?= esc($userName) ?></div>
                        <div class="text-muted text-truncate" style="font-size: 0.7rem;"><?= esc($userEmail) ?></div>
                    </div>
                </div>
                <a href="/logout" class="text-danger" title="Logout">
                    <i class="bi bi-box-arrow-right fs-6"></i>
                </a>
            </div>
        </div>
    </aside>

    <!-- RIGHT MAIN WORKSPACE -->
    <div class="admin-main">
        <header class="admin-topbar">
            <div class="admin-topbar-title">
                <?= esc($pageHeader) ?> <span>/ shopease.local</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="/" class="btn btn-dark btn-sm fw-semibold px-3">
                    <i class="bi bi-shop me-1"></i> STORE <i class="bi bi-box-arrow-up-right ms-1"></i>
                </a>
                <a href="/logout" class="btn btn-outline-danger btn-sm fw-semibold px-3">
                    <i class="bi bi-box-arrow-right me-1"></i> LOGOUT
                </a>
            </div>
        </header>

        <main class="admin-content">
            <?= $this->include('partials/alerts') ?>
            <?= $this->renderSection('content') ?>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
