<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $route['default_controller']   = 'login';

// $routes->get('/', 'Home::index');
$routes->get('/', 'Auth::index');
$routes->setAutoRoute(true);
