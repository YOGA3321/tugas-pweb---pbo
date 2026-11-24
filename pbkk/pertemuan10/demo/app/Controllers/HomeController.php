<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();

        $selectedSlug = $this->request->getGet('category');
        $categories   = $categoryModel->orderBy('id', 'ASC')->findAll();

        $builder = $productModel
            ->select('products.*, categories.name AS category_name, categories.slug AS category_slug')
            ->join('categories', 'categories.id = products.category_id')
            ->where('products.status', 'active');

        if (! empty($selectedSlug)) {
            $builder->where('categories.slug', $selectedSlug);
        }

        $products = $builder->orderBy('products.id', 'DESC')->findAll();

        $data = [
            'title'        => 'ShopEase – Online Store',
            'active'       => 'home',
            'categories'   => $categories,
            'products'     => $products,
            'selectedSlug' => $selectedSlug,
        ];

        return view('frontend/home', $data);
    }
}
