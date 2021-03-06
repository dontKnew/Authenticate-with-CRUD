<?php

namespace Config;

use App\Controllers\LoginController;

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Authentication Pages
$routes->get('auth/', 'Home::index', ['filter'=>'auth']);
$routes->get("auth/members", "Home::index", ['filter'=>'auth']);
$routes->match(["get", "post"], "auth/add-member", "Home::addMember", ['filter'=>'auth']);
$routes->match(["get", "post"], "auth/edit-member/(:num)", "Home::editMember/$1", ['filter'=>'auth']);
$routes->get("auth/delete-member/(:num)", "Home::deleteMember/$1", ['filter'=>'auth']);
$routes->delete("auth/clear-members", "Home::clearMembers",['filter'=>'auth']);

//Normal Page
$routes->get('auth/login', 'LoginController::index');
$routes->post('auth/login', 'LoginController::login');
$routes->get('auth/logout', 'LoginController::logout');
$routes->get('auth/register', 'RegisterController::index');
$routes->post('auth/register', 'RegisterController::register');



//practice page 
$routes->get('auth/practice', 'Home::example');


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
