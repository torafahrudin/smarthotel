<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/dashboard', 'Home::index');

//MASTER PRODUK 
$routes->get('master-produk', 'Master/ProdukController::index');
$routes->get('get-produk', 'Master/ProdukController::get_data');
$routes->get('show-produk', 'Master/ProdukController::show');
$routes->post('add-produk', 'Master/ProdukController::store');
$routes->post('update-produk', 'Master/ProdukController::update');
$routes->get('delete-produk', 'Master/ProdukController::destroy');

// MASTER CHART OF ACCOUNT
$routes->get('get-subcoa', 'Master/CoaController::get_subcoa');

$routes->get('master-coa', 'Master/CoaController::index');
$routes->get('get-coa', 'Master/CoaController::get_data');
$routes->get('show-coa', 'Master/CoaController::show');
$routes->post('add-coa', 'Master/CoaController::store');
$routes->post('update-coa', 'Master/CoaController::update');
$routes->get('delete-coa', 'Master/CoaController::destroy');


//MASTER PRODUK 
$routes->get('master-centro', 'Master/CentroAwalController::index');
$routes->get('get-centro', 'Master/CentroAwalController::get_data');
$routes->get('show-centro', 'Master/CentroAwalController::show');
$routes->post('update-centro', 'Master/CentroAwalController::update');

// TRANSAKSI PENJUALAN
$routes->get('trx-penjualan', 'Transaksi/PenjualanController::index');
$routes->get('get-penjualan', 'Transaksi/PenjualanController::get_data');

/**
 * KMEANS
 */
$routes->get('analisis-cluster', 'KmeansController::index');
$routes->get('analisis-cluster-get', 'KmeansController::load_data');

//Rekomendasi Produk
$routes->get('product-reco', 'KmeansController::get_reco');


// TESTING MIDTRANS
$routes->get('test-midtrans-token', 'Front/PaymentController::index');
$routes->post('test-midtrans-finish', 'Front/PaymentController::finish');

// REPORT - JURNAL UMUM

$routes->get('report-jurnal', 'Report/JurnalController::index');
$routes->get('report-jurnal-get', 'Report/JurnalController::get_data');


// REPORT - BUKU BESAR
$routes->get('report-bb', 'Report/BukuBesarController::index');
$routes->get('report-bb-get', 'Report/BukuBesarController::get_data');

// REPORT - PENJUALAN
$routes->get('report-sales', 'Report/LapPenjualanController::index');
$routes->get('report-sales-get', 'Report/LapPenjualanController::get_data');

/**
 * --------------------------------------------------------------------
 * FRONT END ROUTING
 * --------------------------------------------------------------------
 */
$routes->get('ahadiat', 'Front/MainController::index');
$routes->get('menu', 'Front/MainController::load_view');

// CART FROND
$routes->get('get-cart', 'Front/CartController::index');
$routes->get('total-cart', 'Front/CartController::get_total');
$routes->get('delete-cart', 'Front/CartController::destroy');
$routes->post('add-cart', 'Front/CartController::store');

// GOPAY
$routes->get('pay-gopay', 'Front/PaymentController::index');
$routes->get('history-gopay', 'Front/PaymentController::get_payment_history');
$routes->get('status-gopay', 'Front/PaymentController::check_payment_status');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
