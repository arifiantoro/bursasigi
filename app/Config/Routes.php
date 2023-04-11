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
$routes->get('/tatacara', 'Home::tatacara');
$routes->get('/kerjasama', 'Home::kerjasama');

$routes->get('/tester', 'Home::enkripsi');

// Halaman Administrator
$routes->group('/', ['filter' => 'role:administrator'], function ($routes) {
    $routes->get('/admin', 'Admin\Dashboard::index');

    // Lahan Member
    $routes->get('admin/member', 'Admin\Member::index');
    $routes->get('admin/member/detail/(:any)', 'Admin\Member::detail/$1');
    $routes->get('admin/member/edit/(:any)', 'Admin\Member::edit/$1');

    $routes->get('admin/member/riwayat/delete/(:num)', 'Admin\Member::riwayatDelete/$1');
    $routes->get('admin/member/get', 'Admin\Member::getMember');
    $routes->get('admin/member/tambah', 'Admin\Member::tambah');
    $routes->post('admin/member/tambah/post', 'Admin\Member::tambahPeserta');
    $routes->post('admin/member/edit/put', 'Admin\Member::editPeserta');
    $routes->post('admin/member/riwayat/post', 'Admin\Member::riwayatPost');

    // Lahan Psikologi
    $routes->get('admin/jadwaltest', 'Admin\Psikologi::index');
    $routes->get('admin/jadwaltest/tambah', 'Admin\Psikologi::tambah');
    $routes->match(['get', 'post'], 'admin/jadwaltest/peserta', 'Admin\Psikologi::cariPeserta');
    $routes->match(['get', 'post'], 'admin/jadwaltest/get', 'Admin\Psikologi::jadwalGet');
    $routes->get('admin/jadwaltest/cetak/(:any)', 'Admin\Psikologi::cetak/$1');

    $routes->post('admin/jadwaltest/post', 'Admin\Psikologi::postJadwal');
    $routes->post('admin/jadwaltest/piskopost', 'Admin\Psikologi::jadwalPost');
    $routes->post('admin/jadwaltest/piskoput', 'Admin\Psikologi::jadwalPut');

    // Lahan Perusahaan
    $routes->get('admin/perusahaan', 'Admin\Perusahaan::index');
    $routes->get('admin/perusahaan/get', 'Admin\Perusahaan::perusahaanGet');
    $routes->post('admin/perusahaan/tambah/post', 'Admin\Perusahaan::tambahPerusahaan');

    // Lahan Loker Admin
    $routes->get('admin/permintaanl', 'Admin\Lowongan::index');

    // Lahan Pengaturan Admin
    $routes->get('admin/atur-profile', 'Admin\Adminnya::index');
    $routes->get('admin/ubah-password', 'Admin\Adminnya::ubah');
    $routes->post('admin/atur/ubah-post', 'Admin\Adminnya::ubahPassword');
});



// Halaman Perusahaan
$routes->group('/', ['filter' => 'role:perusahaan'], function ($routes) {
    $routes->get('/perusahaan', 'Perusahaan\Dashboard::index');
    $routes->get('/perusahaan/tambahlowongan', 'Perusahaan\Loker::add');
    $routes->post('/perusahaan/tambahlowongan/post', 'Perusahaan\Loker::store');
    $routes->get('/perusahaan/status', 'Perusahaan\Loker::index');
    $routes->get('/perusahaan/status/get', 'Perusahaan\Loker::status');
    $routes->get('/perusahaan/view', 'Perusahaan\Profil::index');
    $routes->get('/perusahaan/atur-profile', 'Perusahaan\Profil::edit');
    $routes->get('/perusahaan/ubah-password', 'Perusahaan\Dashboard::password');
    $routes->get('/perusahaan/ubah', 'Perusahaan\Dashboard::ubahpassword');
});

// Halaman Pencari Kerja
$routes->group('/', ['filter' => 'role:pencari'], function ($routes) {
    $routes->get('/member', 'Member\Dashboard::index');
    $routes->get('/member/atur-profil', 'Member\Profile::index');
    $routes->get('/profile/editPeserta', 'Member\Profile::editPeserta');
    // atur riwayat
    $routes->get('/member/atur-riwayat', 'Member\Profile::riwayat');
    $routes->get('/member/profile/post', 'Member\Profile::riwayatPost');
    $routes->get('/member/profile/delete/(:num)', 'Member\Profile::riwayatDelete/$1');
    //atur kompetensi
    $routes->get('/member/atur-kompetensi', 'Member\Profile::kompetensi');
    $routes->get('/member/profile/kompetensiPost', 'Member\Profile::kompetensiPost');
    $routes->get('/member/kompetensi/delete/(:num)', 'Member\Profile::kompetensiDelete/$1');
    //atur password
    $routes->get('/member/ubah', 'Member\Profile::password');
    $routes->post('/member/profile/ubahpassword', 'Member\Profile::ubahpassword');
});

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
