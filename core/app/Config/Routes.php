<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// Page
$routes->get('/', 'Page::login');
$routes->get('/Dashboard', 'Page::dashboard');
$routes->get('/MasterJabatan', 'Page::masterJabatan');
$routes->get('/MasterPekerjaan', 'Page::masterPekerjaan');
$routes->get('/MasterStatus', 'Page::masterStatus');
$routes->get('/MasterPegawai', 'Page::masterPegawai');
$routes->get('/Kinerja', 'Page::kinerja');
$routes->get('/BukuTamu', 'Page::bukuTamuUser');
$routes->get('/BukuTamuAdmin', 'Page::bukuTamuAdmin');

// Proses
$routes->resource('Login_');
$routes->resource('Jabatan_');
$routes->resource('JabatanEdit_');
$routes->resource('Pekerjaan_');
$routes->resource('PekerjaanEdit_');
$routes->resource('Status_');
$routes->resource('StatusEdit_');
$routes->resource('Pegawai_');
$routes->resource('PegawaiEdit_');
$routes->resource('Kinerja_');
$routes->resource('KinerjaEdit_');
$routes->resource('KinerjaEditKeterangan_');
$routes->resource('BukuTamu_');
$routes->resource('BukuTamuEdit_');

// Proses Hapus dan Keluar
$routes->get('/HapusJabatan/(:num)', 'Jabatan_::hapus/$1');
$routes->get('/HapusPekerjaan/(:num)', 'Pekerjaan_::hapus/$1');
$routes->get('/HapusStatus/(:num)', 'Status_::hapus/$1');
$routes->get('/HapusPegawai/(:num)', 'Pegawai_::hapus/$1');
$routes->get('/HapusKinerja/(:num)', 'Kinerja_::hapus/$1');
$routes->get('/HapusBukuTamu/(:num)', 'BukuTamu_::hapus/$1');
$routes->get('/Keluar', 'Login_::keluar');

// Ganti Status
$routes->get('/GantiStatus/(:num)/(:num)', 'Kinerja_::GantiStatus/$1/$2');