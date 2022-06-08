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
$routes->setDefaultController('UserController');
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
$routes->get('login', 'UserController::index');
$routes->get('signup', 'UserController::signup');
$routes->get('dashboard', 'UserController::dashboard');
$routes->get('tickets', 'Tickets::tickets');
$routes->get('newticket', 'Tickets::newticket');
$routes->get('viewticket', 'Tickets::viewticket');
$routes->get('report', 'ReportController::report');
$routes->get('printreport-staff', 'ReportController::report_staff');
$routes->get('printreport', 'ReportController::printreport');
$routes->get('printslip', 'PrintSlip::printslip');
$routes->get('incident', 'IncidentController::incident');
$routes->get('view-incident', 'IncidentController::view_incident');
$routes->get('new-incident', 'IncidentController::new_incident');

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
