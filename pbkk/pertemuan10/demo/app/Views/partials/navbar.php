<?php
$active   = $active ?? '';
$loggedIn = (bool) session()->get('logged_in');
$role     = (string) session()->get('role');
$userName = (string) session()->get('name');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <i class="bi bi-bag-check-fill text-primary me-1"></i> ShopEase
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $active === 'home' ? 'active fw-semibold' : '' ?>" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $active === 'about' ? 'active fw-semibold' : '' ?>" href="/about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $active === 'contact' ? 'active fw-semibold' : '' ?>" href="/contact">Kontak</a>
                </li>
                <?php if ($loggedIn && $role === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $active === 'categories' ? 'active fw-semibold' : '' ?>" href="/admin/categories">
                            <i class="bi bi-tags me-1"></i>Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $active === 'products' ? 'active fw-semibold' : '' ?>" href="/admin/products">
                            <i class="bi bi-box-seam me-1"></i>Produk
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                <?php if ($loggedIn): ?>
                    <li class="nav-item">
                        <span class="navbar-text text-light small me-2">
                            <i class="bi bi-person-circle me-1"></i>
                            <?= esc($userName) ?>
                            <span class="badge bg-primary ms-1"><?= esc(strtoupper($role)) ?></span>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="/logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm <?= $active === 'login' ? 'active' : '' ?>" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm <?= $active === 'register' ? 'active' : '' ?>" href="/register">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
