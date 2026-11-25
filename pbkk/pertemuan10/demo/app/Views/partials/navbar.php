<?php
$active   = $active ?? '';
$loggedIn = (bool) session()->get('logged_in');
$role     = (string) session()->get('role');
$userName = (string) session()->get('name');
?>
<nav class="navbar navbar-expand-lg se-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand se-brand" href="/">
            <span class="se-brand-mark"><i class="bi bi-bag-heart-fill"></i></span>
            <span>ShopEase</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link se-nav-link <?= $active === 'home' ? 'active' : '' ?>" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link se-nav-link <?= $active === 'about' ? 'active' : '' ?>" href="/about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link se-nav-link <?= $active === 'contact' ? 'active' : '' ?>" href="/contact">Kontak</a>
                </li>
                <?php if ($loggedIn && $role === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link se-nav-link" href="/admin/dashboard">
                            <i class="bi bi-speedometer2 me-1"></i>Admin Panel
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav align-items-lg-center gap-2">
                <?php if ($loggedIn): ?>
                    <li class="nav-item">
                        <span class="navbar-text small fw-semibold text-dark me-1">
                            <i class="bi bi-person-circle text-primary me-1"></i>
                            <?= esc($userName) ?>
                            <span class="badge bg-primary-subtle text-primary ms-1"><?= esc(strtoupper($role)) ?></span>
                        </span>
                    </li>
                    <?php if ($role === 'admin'): ?>
                        <li class="nav-item">
                            <a class="btn btn-dark btn-sm fw-semibold px-3" href="/admin/dashboard">Dashboard</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger btn-sm fw-semibold px-3" href="/logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark btn-sm fw-semibold px-3 <?= $active === 'login' ? 'active' : '' ?>" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm fw-semibold px-3 <?= $active === 'register' ? 'active' : '' ?>" href="/register">Daftar Gratis</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
