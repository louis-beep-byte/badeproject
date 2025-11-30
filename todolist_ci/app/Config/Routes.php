<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;
use Config\Services;

/** @var RouteCollection $routes */
$routes = Services::routes();

// Load system routes first
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// Router setup
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // Disable auto-routing for security

// 🧪 Database Connection Test
$routes->get('php-db-test', 'Home::phpDbTest');

// 🏠 Homepage
$routes->get('/', 'Home::index');

// 🔐 Authentication
$routes->match(['get','post'], 'login', 'Auth::login');
$routes->match(['get','post'], 'register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

// 📝 To-Do List (Protected with auth filter)
$routes->group('todolist', ['filter' => 'auth'], function($routes){
    $routes->get('/', 'Todo::index');                    // List tasks
    $routes->get('task_history', 'Todo::history');       // Task history
    $routes->post('add', 'Todo::add');                   // Add task
    $routes->post('edit/(:num)', 'Todo::edit/$1');       // Edit task
    $routes->get('delete/(:num)', 'Todo::delete/$1');    // Delete task
    $routes->get('complete/(:num)', 'Todo::complete/$1');// Complete task
});

// Environment-specific routes
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
$routes->get('auth/testDb', 'Auth::testDb');
