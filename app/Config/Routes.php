<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::prosesRegister');

$routes->group('', ['filter' => 'auth'], function($routes){

    $routes->get('/dashboard', 'Dashboard::index');

    $routes->get('/barang', 'Barang::index');

    $routes->get('/barang/tambah', 'Barang::create');

    $routes->post('/barang/simpan', 'Barang::store');

    $routes->get('/profile', 'Profile::index');

});

$routes->group('barang', ['filter' => 'auth'], function($routes){

    $routes->get('/', 'Barang::index');

    $routes->get('tambah', 'Barang::create');

});

$routes->post('barang/simpan', 'Barang::store', ['filter' => 'auth']);

$routes->get('detail/(:num)', 'Barang::detail/$1');

$routes->group('barang', ['filter' => 'auth'], function ($routes) {

    $routes->get('/', 'Barang::index');

    $routes->get('tambah', 'Barang::create');
    $routes->post('simpan', 'Barang::store');

    $routes->get('detail/(:num)', 'Barang::detail/$1');

    $routes->get('edit/(:num)', 'Barang::edit/$1');
    $routes->post('update/(:num)', 'Barang::update/$1');

    $routes->get('hapus/(:num)', 'Barang::delete/$1');
});

$routes->group('claim',['filter'=>'auth'],function($routes){

    $routes->get('buat/(:num)','Claim::create/$1');

    $routes->post('simpan','Claim::store');

    $routes->get('saya','Claim::index');

});

$routes->group('', ['filter'=>'auth'], function($routes){

    $routes->get(
        'profile',
        'Profile::index'
    );


    $routes->post(
        'profile/update',
        'Profile::update'
    );


});


$routes->group('admin', ['filter'=>'admin'], function($routes){

    $routes->get(
        'claim',
        'Admin\Claim::index'
    );


    $routes->get(
        'claim/terima/(:num)',
        'Admin\Claim::terima/$1'
    );


    $routes->get(
        'claim/tolak/(:num)',
        'Admin\Claim::tolak/$1'
    );

});

$routes->group('', ['filter'=>'auth'], function($routes){


    $routes->get(
        'notification',
        'Notification::index'
    );


    $routes->get(
        'notification/read/(:num)',
        'Notification::read/$1'
    );


});

$routes->get('/', 'Home::index');


$routes->get(
    'kategori',
    'Kategori::index'
);


$routes->get(
    'tentang',
    'Home::tentang'
);


$routes->get(
    'logout',
    'Auth::logout'
);