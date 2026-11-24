<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 fw-bold mb-0">Manajemen Kategori</h1>
        <p class="text-muted small mb-0">Kelola kategori produk pada toko online ShopEase</p>
    </div>
    <a href="/admin/categories/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
    </a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Kategori</th>
                    <th>Slug</th>
                    <th>Deskripsi</th>
                    <th style="width: 120px;">Produk</th>
                    <th style="width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($categories === []): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada data kategori.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($categories as $i => $item): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td class="fw-semibold"><?= esc($item['name']) ?></td>
                            <td><code><?= esc($item['slug']) ?></code></td>
                            <td class="text-muted small"><?= esc($item['description'] ?: '-') ?></td>
                            <td><span class="badge bg-secondary"><?= (int) $item['product_count'] ?> produk</span></td>
                            <td>
                                <a href="/admin/categories/edit/<?= (int) $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form method="post" action="/admin/categories/delete/<?= (int) $item['id'] ?>" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
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
