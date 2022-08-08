<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
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
// $routes->get('/login/(:any)', 'login::login/$1');
$routes->get('/', 'pages::index', ['filter' => 'auth']);
// $routes->get('/', 'Pages::index2');
$routes->get('/komik/detail/(:segment)', 'komik::detail/$1');
$routes->get('/komik/edit/(:segment)', 'komik::edit/$1');
$routes->get('/komik/lanjut/(:segment)', 'komik::lanjut/$1');
$routes->get('/komik/lanjut2/(:segment)', 'komik::lanjut2/$1');
$routes->get('/komik/generate/(:segment)', 'komik::generate/$1');
$routes->delete('/komik/(:num)', 'komik::delete/$1');
$routes->delete('/komik/(:num)', 'komik::generate/$1');
$routes->get('/komik/(:any)', 'komik::detail/$1');
$routes->get('/komik/(:any)', 'komik::generate/$1');
$routes->get('/mengajar/detail/(:segment)', 'mengajar::detail/$1');
$routes->get('/mengajar/edit/(:segment)', 'mengajar::edit/$1');
$routes->get('/mengajar/lanjut2/(:segment)', 'mengajar::lanjut2/$1');
$routes->get('/mengajar/lanjut/(:segment)', 'mengajar::lanjut/$1');
$routes->get('/mengajar/generate/(:segment)', 'mengajar::generate/$1');
$routes->delete('/mengajar/(:num)', 'mengajar::delete/$1');
$routes->get('/mengajar/(:any)', 'mengajar::detail/$1');
$routes->get('/komitmen/detail/(:segment)', 'komitmen::detail/$1');
$routes->get('/komitmen/edit/(:segment)', 'komitmen::edit/$1');
$routes->get('/komitmen/lanjut/(:segment)', 'komitmen::lanjut/$1');
$routes->get('/komitmen/lanjut2/(:segment)', 'komitmen::lanjut2/$1');
$routes->get('/komitmen/generate/(:segment)', 'komitmen::generate/$1');
$routes->delete('/komitmen/(:num)', 'komitmen::delete/$1');
$routes->get('/komitmen/(:any)', 'komitmen::detail/$1');
$routes->get('/detail/(:any)', 'detail::detail/$1');
$routes->get('/monitoring/(:any)', 'monitoring::monitoring/$1');
$routes->get('/report/(:any)', 'report::index/$1');
$routes->get('/report/(:any)', 'report::indexStupen/$1');
$routes->get('/report/(:any)', 'report::indexNgajar/$1');
$routes->get('/report/laporan/(:segment)', 'report::laporan/$1');
// $routes->get('/pages/(:segment)', 'pages::index/$1');
// $routes->get('/pages/(:segment)', 'pages::index2/$1');




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
