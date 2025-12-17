<?php

use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(false);

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('stanice/(:num)', 'Main::stanice/$1'); //routa pro stanice(číslo) a zavolá controller Main metodu stanice s parametrem
$routes->get('data/(:num)', 'Main::data/$1');
$routes->get('dataAjax/(:num)', 'Main::dataAjax/$1');
$routes->get('vsechnystanice', 'Main::vse');