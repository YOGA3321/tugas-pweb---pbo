<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h4 fw-bold mb-1">TAMBAH KATEGORI BARU</h1>
        <p class="text-muted small mb-0">Tambahkan kategori produk baru ke database ShopEase.</p>
    </div>
    <a href="/admin/categories" class="btn btn-outline-dark btn-sm fw-semibold">&larr; Kembali</a>
</div>

<div class="admin-panel p-4" style="max-width: 680px;">
    <form method="post" action="/admin/categories/store">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold small">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="<?= old('name') ?>" placeholder="Contoh: Peralatan Rumah" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-semibold small">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                      placeholder="Deskripsi singkat kategori"><?= old('description') ?></textarea>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-dark fw-semibold px-4">Simpan Kategori</button>
            <a href="/admin/categories" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
