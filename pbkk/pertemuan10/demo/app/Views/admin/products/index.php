<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 fw-bold mb-0">Manajemen Produk</h1>
        <p class="text-muted small mb-0">Kelola produk, harga, stok, kategori, dan gambar produk</p>
    </div>
    <a href="/admin/products/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Produk
    </a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 55px;">No</th>
                    <th style="width: 85px;">Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th style="width: 165px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($products === []): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum ada data produk.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($products as $i => $p): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td>
                                <?php if (! empty($p['image']) && is_file(FCPATH . 'uploads/products/' . $p['image'])): ?>
                                    <img src="/uploads/products/<?= esc($p['image']) ?>"
                                         alt="<?= esc($p['name']) ?>"
                                         class="rounded border" style="width: 56px; height: 56px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-light border rounded d-flex align-items-center justify-content-center text-muted"
                                         style="width: 56px; height: 56px;">
                                        <i class="bi bi-image"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="fw-semibold"><?= esc($p['name']) ?></div>
                                <div class="small text-muted text-truncate" style="max-width: 260px;">
                                    <?= esc($p['description'] ?: '-') ?>
                                </div>
                            </td>
                            <td><span class="badge bg-info-subtle text-info-emphasis"><?= esc($p['category_name']) ?></span></td>
                            <td class="fw-semibold">Rp <?= number_format((float) $p['price'], 0, ',', '.') ?></td>
                            <td><?= (int) $p['stock'] ?></td>
                            <td>
                                <?php if ($p['status'] === 'active'): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/admin/products/edit/<?= (int) $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form method="post" action="/admin/products/delete/<?= (int) $p['id'] ?>" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
