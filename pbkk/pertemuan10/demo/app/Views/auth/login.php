<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h4 fw-bold mb-1 text-center">Login ShopEase</h1>
                <p class="text-muted small text-center mb-4">Masuk sebagai Admin atau Customer</p>

                <form method="post" action="/login">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= old('email') ?>" placeholder="admin@shopease.test" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <div class="mt-3 p-3 bg-light border rounded small">
                    <div class="fw-semibold mb-1">Akun Demo:</div>
                    <div><strong>Admin:</strong> <code>admin@shopease.test</code> / <code>admin123</code></div>
                    <div><strong>Customer:</strong> <code>customer@shopease.test</code> / <code>customer123</code></div>
                </div>

                <div class="text-center mt-3 small">
                    Belum punya akun? <a href="/register">Daftar di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
