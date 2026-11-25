<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="h4 fw-bold mb-1">MANAJEMEN KATEGORI PRODUK</h1>
        <p class="text-muted small mb-0">Kelola kategori, slug URL, dan pantau jumlah produk yang terhubung.</p>
    </div>
    <a href="/admin/categories/create" class="btn btn-dark fw-bold px-3">
        <i class="bi bi-plus-lg me-1"></i> TAMBAH KATEGORI
    </a>
</div>

<div class="admin-panel">
    <div class="table-responsive">
        <table class="table admin-table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Kategori</th>
                    <th>Slug</th>
                    <th>Deskripsi</th>
                    <th style="width: 130px;">Produk</th>
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
                            <td class="fw-bold text-dark"><?= esc($item['name']) ?></td>
                            <td><code><?= esc($item['slug']) ?></code></td>
                            <td class="text-muted small"><?= esc($item['description'] ?: '-') ?></td>
                            <td><span class="badge bg-dark"><?= (int) $item['product_count'] ?> produk</span></td>
                            <td>
                                <a href="/admin/categories/edit/<?= (int) $item['id'] ?>" class="btn btn-sm btn-outline-dark">Edit</a>
                                <form method="post" action="/admin/categories/delete/<?= (int) $item['id'] ?>" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
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
