<?php

namespace Config;

use App\Controllers\BlogsController;

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
$routes->get('/', 'BlogsController::home');
$routes->get('/blogs', 'BlogsController::index');
$routes->get('/about', function () {
    $data = [
        'title' => "Blog - About"
    ];
    //closure : ini kalo ga ada controller
    echo view('v_about', $data);
});
$routes->get('/blogs/tambahblog', 'BlogsController::tambahblog');
$routes->delete('/blogs/(:any)', 'BlogsController::delete/$1');
$routes->post('/blogs/postingblog', 'BlogsController::posting');
$routes->get('/blogs/edit/(:any)', 'BlogsController::edit/$1'); //$1 untuk nampung parameter any
$routes->post('/blogs/update/(:any)', 'BlogsController::update/$1');
$routes->get('/blogs/artikel/(:any)', 'BlogsController::detail/$1');

//user routes

$routes->get('/blogs/register', 'UserController::register');
$routes->post('/blogs/saveRegister', 'UserController::saveRegister');

$routes->get('/blogs/login', 'UserController::login');

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
