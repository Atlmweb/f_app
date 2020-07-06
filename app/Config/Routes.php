<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('migrate', 'Migrate::index');
$routes->post('login', 'Home::login');
$routes->get('login', 'Home::login');
$routes->get('register', 'Home::register');
$routes->post('register', 'Home::register');
$routes->get('logout', 'Home::logout');
$routes->get('dashboard', 'Home::dashboard');
$routes->get('new_service', 'Home::new_service');
$routes->get('new_service/(:segment)', 'Home::new_service');
$routes->post('new_service', 'Home::new_service');
$routes->get('service_list', 'Home::service_list');
$routes->get('givings', 'Home::my_seeds');
$routes->get('all_givings', 'Home::all_seeds');
$routes->get('contact', 'Home::contact');
$routes->post('contact', 'Home::contact');
$routes->get('thank_you', 'Home::thank_you');
$routes->get('get_involved', 'Home::projects');
$routes->get('get_involved/:any', 'Home::projects');
$routes->get('videos', 'Home::videos');
$routes->get('videos/:any', 'Home::videos');
$routes->get('activate_account/:any', 'Home::activate_account');
$routes->get('member', 'Member::dashboard');
$routes->get('client', 'Client::dashboard');
$routes->get('admin', 'Admin::dashboard');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
