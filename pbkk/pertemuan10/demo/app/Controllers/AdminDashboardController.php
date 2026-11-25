<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class AdminDashboardController extends BaseController
{
    public function index(): string
    {
        $categoryModel = new CategoryModel();
        $productModel  = new ProductModel();
        $userModel     = new UserModel();

        $totalCategories = $categoryModel->countAllResults();
        $totalProducts   = $productModel->countAllResults();
        $activeProducts  = $productModel->where('status', 'active')->countAllResults();
        $totalUsers      = $userModel->countAllResults();

        $allProducts = $productModel
            ->select('products.*, categories.name AS category_name')
            ->join('categories', 'categories.id = products.category_id')
            ->orderBy('products.id', 'DESC')
            ->findAll();

        $inventoryValue = 0.0;
        $totalStock     = 0;
        foreach ($allProducts as $p) {
            $inventoryValue += (float) $p['price'] * (int) $p['stock'];
            $totalStock     += (int) $p['stock'];
        }

        $categories = $categoryModel
            ->select('categories.*, COUNT(products.id) AS product_count')
            ->join('products', 'products.category_id = categories.id', 'left')
            ->groupBy('categories.id')
            ->orderBy('product_count', 'DESC')
            ->findAll();

        return view('admin/dashboard', [
            'title'           => 'Overview & Catalog – Admin ShopEase',
            'pageHeader'      => 'OVERVIEW & CATALOG',
            'active'          => 'dashboard',
            'totalCategories' => $totalCategories,
            'totalProducts'   => $totalProducts,
            'activeProducts'  => $activeProducts,
            'totalUsers'      => $totalUsers,
            'totalStock'      => $totalStock,
            'inventoryValue'  => $inventoryValue,
            'recentProducts'  => array_slice($allProducts, 0, 6),
            'categories'      => $categories,
        ]);
    }
}
