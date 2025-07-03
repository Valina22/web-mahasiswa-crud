<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// === CRUD Mahasiswa ===
$routes->get('/crud', 'Crud::index');
$routes->get('/crud/tambah', 'Crud::tambah');
$routes->post('/crud/tambah', 'Crud::tambah');
$routes->get('/crud/edit', 'Crud::edit');
$routes->get('/crud/editan', 'Crud::editan');
$routes->get('crud/edit/(:segment)', 'Crud::edit/$1');
$routes->get('/crud/hapus/(:segment)', 'Crud::hapus/$1');
$routes->post('/crud/update', 'Crud::update');
$routes->post('/crud/edit/(:segment)', 'Crud::update/$1'); // proses update
// === Praktikum / Latihan ===
$routes->get('/pretest', 'Praktikum::pretest');
$routes->get('/profil', 'Praktikum::profil');
$routes->get('/form', 'Praktikum::form');
$routes->post('/simpan', 'Praktikum::simpan');
$routes->get('/tambah', 'Praktikum::tambah');
$routes->get('/tampil', 'Praktikum::tampil');

// === Latihan Form ===
$routes->get('form/submit', 'FormController::index');
$routes->post('form/submit', 'FormController::submit');
$routes->match(['get', 'post'], 'form', 'FormController::index');
$routes->post('process-form', 'FormController::processForm');

// === Halaman Lain ===
$routes->get('/latihanview', 'HelloWorld::index');
$routes->get('/layouting', 'LayoutingController::index');
$routes->get('/skills', 'Page::skills');
$routes->get('/profile', 'Page::profile');

