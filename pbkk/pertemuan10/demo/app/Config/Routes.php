<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Praktikum 3: Halaman Utama & Navigasi
$routes->get('/', 'HomeController::index', ['as' => 'home']);
$routes->get('about', 'AboutController::index', ['as' => 'about']);
$routes->get('contact', 'ContactController::index', ['as' => 'contact']);
$routes->post('contact/send', 'ContactController::send', ['as' => 'contact.send']);

// Praktikum 6: Authentication (Login, Register, Logout)
$routes->get('login', 'AuthController::loginForm', ['as' => 'login']);
$routes->post('login', 'AuthController::login');
$routes->get('register', 'AuthController::registerForm', ['as' => 'register']);
$routes->post('register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout', ['as' => 'logout']);

// Praktikum 4, 5, 6: Admin Panel (Dilindungi AuthFilter role admin)
$routes->group('admin', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('/', 'AdminDashboardController::index');
    $routes->get('dashboard', 'AdminDashboardController::index');

    // CRUD Kategori Produk
    $routes->get('categories', 'CategoryController::index');
    $routes->get('categories/create', 'CategoryController::create');
    $routes->post('categories/store', 'CategoryController::store');
    $routes->get('categories/edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('categories/update/(:num)', 'CategoryController::update/$1');
    $routes->post('categories/delete/(:num)', 'CategoryController::delete/$1');

    // CRUD Produk & Upload Gambar
    $routes->get('products', 'ProductController::index');
    $routes->get('products/create', 'ProductController::create');
    $routes->post('products/store', 'ProductController::store');
    $routes->get('products/edit/(:num)', 'ProductController::edit/$1');
    $routes->post('products/update/(:num)', 'ProductController::update/$1');
    $routes->post('products/delete/(:num)', 'ProductController::delete/$1');
});
