<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');



$routes->get('/daftar-kursus', 'Mahasiswa::daftar');
$routes->get('/daftar-kursus/(:any)', 'Mahasiswa::daftar_form/$1');
$routes->post('/daftar-kursus/(:any)', 'Mahasiswa::daftar_form_post/$1');
$routes->get('/status-pendaftaran', 'Mahasiswa::status_pendaftaran');

$routes->get('/admin', 'Admin::index');

$routes->get('/admin/data-kursus', 'Admin::index');
$routes->get('/admin/data-kursus/tambah', 'Admin::kursus_tambah');
$routes->post('/admin/data-kursus/tambah', 'Admin::kursus_tambah_post');
$routes->get('/admin/data-kursus/(:any)', 'Admin::kursus_edit/$1');
$routes->post('/admin/data-kursus/edit/(:any)', 'Admin::kursus_edit_post/$1');

$routes->get('/admin/data-kursus/delete/(:any)', 'Admin::kursus_delete/$1');
$routes->get('/admin/data-jadwal-kursus', 'Admin::jadwal_kursus');

$routes->get('/admin/data-pendaftaran', 'Admin::pendaftaran_peserta');

$routes->get('/admin/data-mahasiswa', 'Admin::mahasiswa');


// Route Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login_post');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register_post');
$routes->get('/logout', 'Auth::logout');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
