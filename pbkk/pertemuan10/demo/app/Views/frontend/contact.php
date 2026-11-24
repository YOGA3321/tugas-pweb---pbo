<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="row g-4">
    <div class="col-md-5">
        <div class="bg-white border rounded-3 p-4 shadow-sm h-100">
            <h1 class="h4 fw-bold mb-3">Hubungi Kami</h1>
            <p class="text-muted small">
                Silakan kirim pertanyaan mengenai produk, kategori, atau kendala akun melalui formulir di samping.
            </p>
            <ul class="list-unstyled small text-muted mb-0">
                <li class="mb-2"><i class="bi bi-envelope me-2 text-primary"></i>cs@shopease.test</li>
                <li class="mb-2"><i class="bi bi-telephone me-2 text-primary"></i>(031) 500-1234</li>
                <li><i class="bi bi-geo-alt me-2 text-primary"></i>Surabaya, Jawa Timur</li>
            </ul>
        </div>
    </div>

    <div class="col-md-7">
        <div class="bg-white border rounded-3 p-4 shadow-sm">
            <h2 class="h5 fw-bold mb-3">Kirim Pesan</h2>
            <form method="post" action="/contact/send">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required><?= old('message') ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
