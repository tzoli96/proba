<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Test::index');

$routes->group('api', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
    $routes->group('hotels', ['namespace' => 'App\Controllers\Api\Hotels'], static function ($routes) {
        $routes->get('', 'Index::index');
    });
});
