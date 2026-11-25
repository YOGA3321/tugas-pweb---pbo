<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="row g-4">
    <div class="col-md-5">
        <div class="bg-white border rounded-4 p-4 shadow-sm h-100">
            <span class="badge bg-primary-subtle text-primary mb-2">Kontak Kami</span>
            <h1 class="h4 fw-bold mb-3">Ada Pertanyaan? Hubungi Tim ShopEase</h1>
            <p class="text-muted small mb-4">
                Silakan kirim pertanyaan mengenai katalog produk, kategori, atau akun melalui formulir di samping.
            </p>
            <div class="d-flex flex-column gap-3 small">
                <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 border">
                    <i class="bi bi-envelope-fill text-primary fs-5"></i>
                    <div>
                        <div class="fw-bold">Email Dukungan</div>
                        <div class="text-muted">cs@shopease.test</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 border">
                    <i class="bi bi-telephone-fill text-primary fs-5"></i>
                    <div>
                        <div class="fw-bold">Telepon</div>
                        <div class="text-muted">(031) 500-1234</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 border">
                    <i class="bi bi-geo-alt-fill text-primary fs-5"></i>
                    <div>
                        <div class="fw-bold">Alamat Toko</div>
                        <div class="text-muted">Keputih, Sukolilo, Surabaya</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="bg-white border rounded-4 p-4 shadow-sm">
            <h2 class="h5 fw-bold mb-3">Formulir Pesan</h2>
            <form method="post" action="/contact/send">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold small">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold small">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" placeholder="nama@email.com" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label fw-semibold small">Pesan</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Tulis pesan minimal 10 karakter..." required><?= old('message') ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary fw-semibold px-4">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
