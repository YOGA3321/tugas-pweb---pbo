<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h4 fw-bold mb-1">TAMBAH PRODUK BARU</h1>
        <p class="text-muted small mb-0">Masukkan detail produk dan unggah gambar produk (JPG/PNG/WEBP).</p>
    </div>
    <a href="/admin/products" class="btn btn-outline-dark btn-sm fw-semibold">&larr; Kembali</a>
</div>

<div class="admin-panel p-4" style="max-width: 780px;">
    <form method="post" action="/admin/products/store" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold small">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="<?= old('name') ?>" placeholder="Contoh: Headset Gaming Pro" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="category_id" class="form-label fw-semibold small">Kategori</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($categories as $c): ?>
                        <option value="<?= (int) $c['id'] ?>" <?= old('category_id') == $c['id'] ? 'selected' : '' ?>>
                            <?= esc($c['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="status" class="form-label fw-semibold small">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="active" <?= old('status', 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= old('status') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label fw-semibold small">Harga (Rp)</label>
                <input type="number" class="form-control" id="price" name="price" min="0" step="100"
                       value="<?= old('price') ?>" placeholder="250000" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="stock" class="form-label fw-semibold small">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" min="0"
                       value="<?= old('stock', '10') ?>" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-semibold small">Deskripsi Produk</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= old('description') ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label fw-semibold small">Foto Produk (JPG/PNG/WEBP, maks 2 MB)</label>
            <input type="file" class="form-control" id="image" name="image"
                   accept="image/jpeg,image/png,image/webp">
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-dark fw-semibold px-4">Simpan Produk</button>
            <a href="/admin/products" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
