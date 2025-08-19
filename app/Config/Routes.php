<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Rute untuk Halaman Admin (dashboard)

$routes->get('admin', 'Home::admin');

// Rute untuk Halaman Pembeli
$routes->get('pembeli', 'PembeliController::index');
$routes->post('pembeli/beli', 'PembeliController::beli');
$routes->get('pembeli/removeFromCart/(:num)', 'PembeliController::removeFromCart/$1');
$routes->get('pembeli/cetakNota', 'PembeliController::cetakNota');

// --- Rute untuk Halaman Web CRUD Produk ---
$routes->get('produk', 'ProdukTampilan::index');
$routes->get('produk/tambah', 'ProdukTampilan::tambah');
$routes->post('produk/simpan', 'ProdukTampilan::simpan');
$routes->get('produk/edit/(:num)', 'ProdukTampilan::edit/$1');
$routes->post('produk/update', 'ProdukTampilan::update'); 
$routes->get('produk/hapus/(:num)', 'ProdukTampilan::hapus/$1');

$routes->get('transaksi', 'TransaksiController::index');
// --- Rute untuk API (tetap terpisah) ---
$routes->group('api', function ($routes) {
    $routes->resource('produk', ['controller' => 'ProdukController']);
});