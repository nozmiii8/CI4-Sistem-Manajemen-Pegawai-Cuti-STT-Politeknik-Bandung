<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');

// Pegawai Routes
$routes->get('pegawai', 'Pegawai::index');
$routes->get('pegawai/create', 'Pegawai::create');
$routes->post('pegawai', 'Pegawai::store');
$routes->get('pegawai/show/(:segment)', 'Pegawai::show/$1');
$routes->get('pegawai/edit/(:segment)', 'Pegawai::edit/$1');
$routes->post('pegawai/update/(:segment)', 'Pegawai::update/$1');
$routes->post('pegawai/delete/(:segment)', 'Pegawai::delete/$1');

// Master Cuti Routes
$routes->get('master-cuti', 'MasterCuti::index');
$routes->get('master-cuti/create', 'MasterCuti::create');
$routes->post('master-cuti', 'MasterCuti::store');
$routes->get('master-cuti/(:segment)/edit', 'MasterCuti::edit/$1');
$routes->post('master-cuti/(:segment)', 'MasterCuti::update/$1');
$routes->post('master-cuti/(:segment)/delete', 'MasterCuti::delete/$1');

// Cuti Pegawai Routes
$routes->get('cuti-pegawai', 'CutiPegawai::index');
$routes->get('cuti-pegawai/create', 'CutiPegawai::create');
$routes->post('cuti-pegawai', 'CutiPegawai::store');
$routes->get('cuti-pegawai/(:segment)/edit', 'CutiPegawai::edit/$1');
$routes->post('cuti-pegawai/(:segment)', 'CutiPegawai::update/$1');
$routes->post('cuti-pegawai/(:segment)/delete', 'CutiPegawai::delete/$1');

// Master Cuti Pegawai Routes
$routes->get('master-cuti-pegawai', 'MasterCutiPegawai::index');
$routes->get('master-cuti-pegawai/create', 'MasterCutiPegawai::create');
$routes->post('master-cuti-pegawai', 'MasterCutiPegawai::store');
$routes->get('master-cuti-pegawai/(:segment)/edit', 'MasterCutiPegawai::edit/$1');
$routes->post('master-cuti-pegawai/(:segment)', 'MasterCutiPegawai::update/$1');
$routes->post('master-cuti-pegawai/(:segment)/delete', 'MasterCutiPegawai::delete/$1');

// Sisa Cuti Routes
$routes->get('sisa-cuti', 'SisaCuti::index');
$routes->get('sisa-cuti/create', 'SisaCuti::create');
$routes->post('sisa-cuti', 'SisaCuti::store');
$routes->get('sisa-cuti/(:segment)/edit', 'SisaCuti::edit/$1');
$routes->post('sisa-cuti/(:segment)', 'SisaCuti::update/$1');
$routes->post('sisa-cuti/(:segment)/delete', 'SisaCuti::delete/$1');
