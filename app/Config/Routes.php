<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pretest', 'Praktikum::pretest');
$routes->get('/profil', 'Praktikum::profil');
$routes->get('/form', 'Praktikum::form');
$routes->post('/simpan', 'Praktikum::simpan');
$routes->get('/tambah', 'Praktikum::tambah');
$routes->get('/tampil', 'Praktikum::tampil');

