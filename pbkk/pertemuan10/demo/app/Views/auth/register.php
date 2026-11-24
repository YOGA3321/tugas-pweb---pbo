<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h4 fw-bold mb-1 text-center">Registrasi Akun</h1>
                <p class="text-muted small text-center mb-4">Buat akun customer ShopEase baru</p>

                <form method="post" action="/register">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= old('name') ?>" placeholder="Nama lengkap Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= old('email') ?>" placeholder="email@contoh.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Minimal 6 karakter" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                               placeholder="Ulangi password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
                </form>

                <div class="text-center mt-3 small">
                    Sudah punya akun? <a href="/login">Login di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
