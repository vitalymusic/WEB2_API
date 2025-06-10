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

// produktu izvade
$routes->get('/products', 'Home::showProducts');
$routes->get('/products/(:num)', 'Home::showProducts/$1');



// POST
// add_product
$routes->post('/products/create', 'Home::addProduct');

