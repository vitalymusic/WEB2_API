<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/lietotaji', 'Home::listUsers');
$routes->get('/users', 'Home::listUsers');
$routes->get('/users/(:num)', 'Home::listUsers/$1');

// endpoints

