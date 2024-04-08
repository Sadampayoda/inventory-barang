<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index',['filter' => 'auth']);
$routes->get('/login','ValidationController::login');
$routes->get('/logout','ValidationController::logout');
$routes->post('/login','ValidationController::ProcessLogin');




$routes->get('/barang','BarangController::index',['filter' => 'auth']);
$routes->get('/barang/search','BarangController::search',['filter' => 'auth']);
$routes->get('/barang/limit','BarangController::limit',['filter' => 'auth']);
$routes->get('/barang/sorting','BarangController::sorting',['filter' => 'auth']);
$routes->get('/barang/tambah','BarangController::tambah',['filter' => 'auth']);
$routes->get('/barang/edit/(:num)','BarangController::edit/$1',['filter' => 'auth']);
$routes->get('/barang/show/(:num)','BarangController::show/$1',['filter' => 'auth']);

$routes->post('barang/hapus','BarangController::hapus',['filter' => 'auth']);
$routes->post('barang/tambah','BarangController::insert',['filter' => 'auth']);
$routes->post('/barang/update/(:num)','BarangController::update/$1',['filter' => 'auth']);

//bagian admin

//barang

//rekening
$routes->get('/rekening','RekeningController::index',['filter' => 'auth']);
$routes->get('/rekening/search','RekeningController::search',['filter' => 'auth']);
$routes->get('/rekening/tambah','RekeningController::tambah',['filter' => 'auth']);
$routes->get('/rekening/edit/(:num)','RekeningController::edit/$1',['filter' => 'auth']);


$routes->post('/rekening/update/(:num)','RekeningController::update/$1',['filter' => 'auth']);
$routes->post('/rekening/tambah','RekeningController::insert',['filter' => 'auth']);
$routes->post('/rekening/hapus','RekeningController::hapus',['filter' => 'auth']);


//karyawan
$routes->get('/karyawan','KaryawanController::index',['filter' => 'auth']);
$routes->get('/karyawan/search','KaryawanController::search',['filter' => 'auth']);
$routes->get('/karyawan/limit','KaryawanController::limit',['filter' => 'auth']);
$routes->get('/karyawan/sorting','KaryawanController::sorting',['filter' => 'auth']);
$routes->get('/karyawan/tambah','KaryawanController::tambah',['filter' => 'auth']);
$routes->get('/karyawan/edit/(:num)','KaryawanController::edit/$1',['filter' => 'auth']);
$routes->get('/karyawan/show/(:num)','KaryawanController::show/$1',['filter' => 'auth']);


$routes->post('/karyawan/update/(:num)','KaryawanController::update/$1',['filter' => 'auth']);
$routes->post('/karyawan/hapus','KaryawanController::hapus',['filter' => 'auth']);
$routes->post('/karyawan/tambah','KaryawanController::insert',['filter' => 'auth']);

//pengguna
$routes->get('/pengguna','PenggunaController::index',['filter' => 'auth']);
$routes->get('/pengguna/search','PenggunaController::search',['filter' => 'auth']);
$routes->get('/pengguna/limit','PenggunaController::limit',['filter' => 'auth']);
$routes->get('/pengguna/tambah','PenggunaController::tambah',['filter' => 'auth']);
$routes->get('/pengguna/edit/(:num)','PenggunaController::edit/$1',['filter' => 'auth']);


$routes->post('/pengguna/update/(:num)','PenggunaController::update/$1',['filter' => 'auth']);
$routes->post('/pengguna/hapus','PenggunaController::hapus',['filter' => 'auth']);
$routes->post('/pengguna/tambah','PenggunaController::insert',['filter' => 'auth']);


//profile
$routes->get('/profile','ProfileController::index',['filter' => 'auth']);
$routes->get('/profile/profil','ProfileController::profil',['filter' => 'auth']);
$routes->get('/profile/sandi','ProfileController::sandi',['filter' => 'auth']);

$routes->post('/profile/sandi','ProfileController::editPassword',['filter' => 'auth']);


//kasir

//keranjang
$routes->get('/keranjang','KeranjangController::index',['filter' => 'auth']);
$routes->get('/keranjang/search','KeranjangController::search',['filter' => 'auth']);
$routes->get('/keranjang/limit','KeranjangController::limit',['filter' => 'auth']);
$routes->get('/keranjang/tambah','KeranjangController::tambah',['filter' => 'auth']);
$routes->get('/keranjang/edit','KeranjangController::edit',['filter' => 'auth']);
$routes->get('/keranjang/pdf','KeranjangController::pdf',['filter' => 'auth']);



$routes->post('/keranjang/update/(:num)','KeranjangController::update/$1',['filter' => 'auth']);
$routes->post('/keranjang/hapus','KeranjangController::hapus',['filter' => 'auth']);
$routes->post('/keranjang/bayar','KeranjangController::pembayaran',['filter' => 'auth']);
$routes->get('/keranjang/insert','KeranjangController::insert',['filter' => 'auth']);


//Bendahara

//transaksi 
$routes->get('/transaksi','TransaksiController::index',['filter' => 'auth']);
$routes->get('/transaksi/search','TransaksiController::search',['filter' => 'auth']);
$routes->get('/transaksi/limit','TransaksiController::limit',['filter' => 'auth']);
$routes->get('/transaksi/tambah','TransaksiController::tambah',['filter' => 'auth']);
$routes->get('/transaksi/edit/(:num)','TransaksiController::edit/$1',['filter' => 'auth']);


$routes->post('/transaksi/update/(:num)','TransaksiController::update/$1',['filter' => 'auth']);
$routes->post('/transaksi/hapus','TransaksiController::hapus',['filter' => 'auth']);
$routes->post('/transaksi/tambah','TransaksiController::insert',['filter' => 'auth']);

//Laporan
$routes->get('/laporan-bendahara','LaporanController::index',['filter' => 'auth']);
$routes->get('/laporan-bendahara/date','LaporanController::date',['filter' => 'auth']);
$routes->get('/laporan-bendahara/category','LaporanController::category',['filter' => 'auth']);
$routes->get('/laporan-bendahara/pdf','LaporanController::pdf',['filter' => 'auth']);


//Gaji Karyawan
$routes->get('/gaji-karyawan','GajiController::index',['filter' => 'auth']);
$routes->get('/gaji-karyawan/search','GajiController::search',['filter' => 'auth']);
$routes->get('/gaji-karyawan/tambah','GajiController::tambah',['filter' => 'auth']);

$routes->post('/gaji-karyawan/tambah','GajiController::insert',['filter' => 'auth']);


//Hutang
$routes->get('/hutang','HutangController::index',['filter' => 'auth']);
$routes->get('/hutang/search','HutangController::search',['filter' => 'auth']);
$routes->get('/hutang/tambah','HutangController::tambah',['filter' => 'auth']);
$routes->get('/hutang/edit/(:num)','HutangController::edit/$1',['filter' => 'auth']);


$routes->post('/hutang/update/(:num)','HutangController::update/$1',['filter' => 'auth']);
$routes->post('/hutang/tambah','HutangController::insert',['filter' => 'auth']);
$routes->post('/hutang/hapus','HutangController::hapus',['filter' => 'auth']);

//Piutang
$routes->get('/piutang','PiutangController::index',['filter' => 'auth']);
$routes->get('/piutang/search','PiutangController::search',['filter' => 'auth']);
$routes->get('/piutang/tambah','PiutangController::tambah',['filter' => 'auth']);
$routes->get('/piutang/edit/(:num)','PiutangController::edit/$1',['filter' => 'auth']);


$routes->post('/piutang/update/(:num)','PiutangController::update/$1',['filter' => 'auth']);
$routes->post('/piutang/tambah','PiutangController::insert',['filter' => 'auth']);
$routes->post('/piutang/hapus','PiutangController::hapus',['filter' => 'auth']);


//Laporan Gaji Karyawan
$routes->get('/laporan-gaji','LaporanGajiController::index',['filter' => 'auth']);
$routes->get('/laporan-gaji/date','LaporanGajiController::date',['filter' => 'auth']);
$routes->get('/laporan-gaji/category','LaporanGajiController::category',['filter' => 'auth']);
$routes->get('/laporan-gaji/pdf','LaporanGajiController::pdf',['filter' => 'auth']);
$routes->get('/laporan-gaji/pdf/(:num)','LaporanGajiController::pdfGaji/$1',['filter' => 'auth']);

$routes->get('/laporan','LaporanUangController::index',['filter' => 'auth']);
$routes->get('/laporan/pdf','LaporanUangController::pdf',['filter' => 'auth']);

