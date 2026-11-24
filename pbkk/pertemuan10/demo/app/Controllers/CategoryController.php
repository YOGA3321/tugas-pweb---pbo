<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class CategoryController extends BaseController
{
    public function index(): string
    {
        $model = new CategoryModel();
        $categories = $model
            ->select('categories.*, COUNT(products.id) AS product_count')
            ->join('products', 'products.category_id = categories.id', 'left')
            ->groupBy('categories.id')
            ->orderBy('categories.id', 'ASC')
            ->findAll();

        return view('admin/categories/index', [
            'title'      => 'Manajemen Kategori – Admin ShopEase',
            'active'     => 'categories',
            'categories' => $categories,
        ]);
    }

    public function create(): string
    {
        return view('admin/categories/create', [
            'title'  => 'Tambah Kategori – Admin ShopEase',
            'active' => 'categories',
        ]);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]|is_unique[categories.name]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $name  = trim((string) $this->request->getPost('name'));
        $model = new CategoryModel();
        $model->insert([
            'name'        => $name,
            'slug'        => url_title($name, '-', true),
            'description' => trim((string) $this->request->getPost('description')),
        ]);

        return redirect()->to('/admin/categories')
            ->with('success', 'Kategori "' . $name . '" berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $model    = new CategoryModel();
        $category = $model->find($id);

        if (! $category) {
            return redirect()->to('/admin/categories')
                ->with('error', 'Kategori tidak ditemukan.');
        }

        return view('admin/categories/edit', [
            'title'    => 'Edit Kategori – Admin ShopEase',
            'active'   => 'categories',
            'category' => $category,
        ]);
    }

    public function update(int $id)
    {
        $model    = new CategoryModel();
        $category = $model->find($id);

        if (! $category) {
            return redirect()->to('/admin/categories')
                ->with('error', 'Kategori tidak ditemukan.');
        }

        $rules = [
            'name' => "required|min_length[3]|max_length[100]|is_unique[categories.name,id,{$id}]",
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $name = trim((string) $this->request->getPost('name'));
        $model->update($id, [
            'name'        => $name,
            'slug'        => url_title($name, '-', true),
            'description' => trim((string) $this->request->getPost('description')),
        ]);

        return redirect()->to('/admin/categories')
            ->with('success', 'Kategori "' . $name . '" berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        $category = $categoryModel->find($id);
        if (! $category) {
            return redirect()->to('/admin/categories')
                ->with('error', 'Kategori tidak ditemukan.');
        }

        $usedCount = $productModel->where('category_id', $id)->countAllResults();
        if ($usedCount > 0) {
            return redirect()->to('/admin/categories')
                ->with('error', 'Kategori "' . $category['name'] . '" tidak dapat dihapus karena masih digunakan oleh ' . $usedCount . ' produk.');
        }

        $categoryModel->delete($id);

        return redirect()->to('/admin/categories')
            ->with('success', 'Kategori "' . $category['name'] . '" berhasil dihapus.');
    }
}
