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

// ketika ada akses yg metode request-nya 'get' / '(ketika mengetikkan sesuatu di URL)'
// alamatnya adalah '/' (root/baseURL) arahkan ke controller Home, lalu methodnya index
$routes->get('/', 'Home::index');

$routes->get('admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('admin/data-user', 'Admin::dataUser', ['filter' => 'role:admin']);
$routes->get('admin/data-gejala', 'Admin::dataGejala', ['filter' => 'role:admin']);
$routes->get('admin/history', 'Admin::history', ['filter' => 'role:admin']);
$routes->get('admin/tambah-data-gejala', 'Admin::tambahGejala', ['filter' => 'role:admin']);
$routes->post('admin/tambah-resep', 'Admin::tambahResep', ['filter' => 'role:admin']);
$routes->post('admin/tambah-data-gejala/save', 'Admin::saveTambahGejala', ['filter' => 'role:admin']);
$routes->post('admin/history/getDataUser', 'Admin::getDataUser', ['filter' => 'role:admin']);
$routes->post('admin/history/getDataPemeriksaan', 'Admin::getDataPemeriksaan', ['filter' => 'role:admin']);

$routes->get('user', 'User::index', ['filter' => 'role:member']);
$routes->get('user/profile', 'User::profile', ['filter' => 'role:member']);
$routes->get('user/survey', 'User::survey', ['filter' => 'role:member']);
$routes->get('user/history', 'User::history', ['filter' => 'role:member']);

$routes->post('user/history/getDataPenyakit', 'User::getDataPenyakit', ['filter' => 'role:member']);
$routes->post('user/profile/getDataUser', 'User::getDataUser', ['filter' => 'role:member']);
$routes->post('user/survey/save', 'User::save');
$routes->post('user/profile/edit', 'User::edit');

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
