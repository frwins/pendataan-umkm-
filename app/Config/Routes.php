<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'pages::index');
$routes->get('auth/login', 'auth::index');
$routes->get('auth2/login', 'auth2::index');

$routes->get('datadiri/edit/(:any)', 'Datadiri::edit/$1');
$routes->get('datadiri/edit2/(:any)', 'Datadiri::edit2/$1');
$routes->get('datadiri2/edit/(:any)', 'Datadiri2::edit/$1');

$routes->get('datadiri/excel', 'datadiri::excel');
$routes->get('datadiri/notifikasi', 'datadiri::notifikasi');

$routes->get('datadiri/akun-pengguna', 'datadiri::akunPengguna');
$routes->post('datadiri/ganti-password', 'datadiri::gantiPassword');

$routes->get('datadiri2/akun-pengguna', 'datadiri2::akunPengguna');
$routes->post('datadiri2/ganti-password', 'datadiri2::gantiPassword');

$routes->get('datadiri/notifikasi/konfirmasi/(:any)', 'datadiri::konfirmasi/$1');
$routes->get('datadiri/notifikasi/hapus/(:any)', 'datadiri::hapusNotifikasi/$1');

$routes->get('datadiri2/aksi/(:any)', 'Datadiri2::kirim/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
