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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->get('/user/register', 'Home::register');
$routes->match(['get', 'post'], 'user/register', 'Home::register');
$routes->get('/user/login', 'Home::login');
$routes->get('/user/logout', 'Home::logout');
$routes->match(['get', 'post'], 'user/login', 'Home::auth');
$routes->get('/user/dashboard', 'Home::dashboard',['filter' => 'auth']);
$routes->get('/admin/dashboard', 'Home::admindashboard',['filter' => 'auth']);
$routes->get('/admin/fetchData', 'Home::fetchData',['filter' => 'auth']);
$routes->get('/admin/fetchData', 'Home::fetchData');
$routes->get('/admin/delete/(:num)', 'Home::delete/$1');
$routes->get('/admin/update/(:num)', 'Home::update/$1');
$routes->post('/admin/updateData', 'Home::updateData');
$routes->post('/register', 'ApiController::create');
$routes->get('/register', 'ApiController::create');
$routes->match(['options'], '/register', 'ApiController::create');
$routes->post('/loginApi', 'ApiController::login');
$routes->match(['options'], '/loginApi', 'ApiController::login');
$routes->get('/userdetail/(:num)', 'ApiController::userdetail/$1');
$routes->get('/userlist', 'ApiController::index');
$routes->options('/userlist', 'ApiController::index');
$routes->get('/deleteApi/(:num)', 'ApiController::delete/$1');
$routes->post('/update/(:num)', 'ApiController::update/$1');






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
