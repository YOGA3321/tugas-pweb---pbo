<?php

use App\Controllers\Profil;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Profil::class, 'index']);
$routes->get('profil', [Profil::class, 'index']);
