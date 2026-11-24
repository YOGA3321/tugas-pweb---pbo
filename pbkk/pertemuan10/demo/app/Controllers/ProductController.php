<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    private const ALLOWED_MIME_TYPES = ['image/jpeg', 'image/png', 'image/webp'];
    private const MAX_IMAGE_BYTES    = 2 * 1024 * 1024; // 2 MB

    public function index(): string
    {
        $product  = new ProductModel();
        $products = $product
            ->select('products.*, categories.name AS category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->orderBy('products.id', 'DESC')
            ->findAll();

        return view('admin/products/index', [
            'title'    => 'Manajemen Produk – Admin ShopEase',
            'active'   => 'products',
            'products' => $products,
        ]);
    }

    public function create(): string
    {
        $category = new CategoryModel();

        return view('admin/products/create', [
            'title'      => 'Tambah Produk – Admin ShopEase',
            'active'     => 'products',
            'categories' => $category->orderBy('name', 'ASC')->findAll(),
        ]);
    }

    public function store()
    {
        $rules = [
            'category_id' => 'required|is_not_unique[categories.id]',
            'name'        => 'required|min_length[3]|max_length[150]',
            'price'       => 'required|numeric|greater_than_equal_to[0]',
            'stock'       => 'required|integer|greater_than_equal_to[0]',
            'status'      => 'required|in_list[active,inactive]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $imageName = null;
        $image     = $this->request->getFile('image');
        if ($image && $image->getError() !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleImageUpload($image);
            if ($uploadResult['error'] !== null) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', $uploadResult['error']);
            }
            $imageName = $uploadResult['filename'];
        }

        $productModel = new ProductModel();
        $name         = trim((string) $this->request->getPost('name'));

        $productModel->insert([
            'category_id' => (int) $this->request->getPost('category_id'),
            'name'        => $name,
            'description' => trim((string) $this->request->getPost('description')),
            'price'       => (float) $this->request->getPost('price'),
            'stock'       => (int) $this->request->getPost('stock'),
            'image'       => $imageName,
            'status'      => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Produk "' . $name . '" berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $productModel  = new ProductModel();
        $categoryModel = new CategoryModel();
        $product       = $productModel->find($id);

        if (! $product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Produk tidak ditemukan.');
        }

        return view('admin/products/edit', [
            'title'      => 'Edit Produk – Admin ShopEase',
            'active'     => 'products',
            'product'    => $product,
            'categories' => $categoryModel->orderBy('name', 'ASC')->findAll(),
        ]);
    }

    public function update(int $id)
    {
        $productModel = new ProductModel();
        $product      = $productModel->find($id);

        if (! $product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Produk tidak ditemukan.');
        }

        $rules = [
            'category_id' => 'required|is_not_unique[categories.id]',
            'name'        => 'required|min_length[3]|max_length[150]',
            'price'       => 'required|numeric|greater_than_equal_to[0]',
            'stock'       => 'required|integer|greater_than_equal_to[0]',
            'status'      => 'required|in_list[active,inactive]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $imageName = $product['image'];
        $image     = $this->request->getFile('image');
        if ($image && $image->getError() !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleImageUpload($image);
            if ($uploadResult['error'] !== null) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', $uploadResult['error']);
            }
            $this->removeImageFile($product['image']);
            $imageName = $uploadResult['filename'];
        }

        $name = trim((string) $this->request->getPost('name'));
        $productModel->update($id, [
            'category_id' => (int) $this->request->getPost('category_id'),
            'name'        => $name,
            'description' => trim((string) $this->request->getPost('description')),
            'price'       => (float) $this->request->getPost('price'),
            'stock'       => (int) $this->request->getPost('stock'),
            'image'       => $imageName,
            'status'      => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Produk "' . $name . '" berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $productModel = new ProductModel();
        $product      = $productModel->find($id);

        if (! $product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Produk tidak ditemukan.');
        }

        $this->removeImageFile($product['image']);
        $productModel->delete($id);

        return redirect()->to('/admin/products')
            ->with('success', 'Produk "' . $product['name'] . '" berhasil dihapus.');
    }

    /**
     * @return array{filename: ?string, error: ?string}
     */
    private function handleImageUpload($image): array
    {
        if (! $image->isValid() || $image->hasMoved()) {
            return ['filename' => null, 'error' => 'Gagal mengunggah gambar produk.'];
        }

        if (! in_array($image->getMimeType(), self::ALLOWED_MIME_TYPES, true)) {
            return ['filename' => null, 'error' => 'Format gambar harus JPG, PNG, atau WEBP.'];
        }

        if ($image->getSize() > self::MAX_IMAGE_BYTES) {
            return ['filename' => null, 'error' => 'Ukuran gambar maksimal 2 MB.'];
        }

        $uploadDir = FCPATH . 'uploads/products';
        if (! is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $newName = $image->getRandomName();
        $image->move($uploadDir, $newName);

        return ['filename' => $newName, 'error' => null];
    }

    private function removeImageFile(?string $filename): void
    {
        if (empty($filename)) {
            return;
        }
        $fullPath = FCPATH . 'uploads/products/' . basename($filename);
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
}
