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
$routes->post('/products/update/(:num)', 'Home::updateProduct/$1');



// delete product
$routes->get('/products/delete/(:num)', 'Home::deleteProduct/$1');


// Login

$routes->get('/login', 'Admin::login');

// Administration
$routes->get('/admin', 'Admin::index');


$routes->get('/admin/pages', 'Admin::pages');
$routes->get('/admin/users', 'Admin::users');
$routes->get('/admin/posts', 'Admin::posts');
$routes->get('/admin/gallery', 'Admin::gallery');