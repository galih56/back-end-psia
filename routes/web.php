<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Barang
$router->get('/barang', 'BarangController@index');
$router->get('/barang/{id}','BarangController@show');
$router->post('/barang', 'BarangController@store');
$router->put('/barang', 'BarangController@update');


$router->get('/kategori', 'BarangController@get_kategori');
$router->get('/notabeli','NotabeliController@index');

$router->post('/notabeli','NotabeliController@store');

$router->get('/notabeli/{id}/barang','NotabeliController@get_barang');
$router->get('/supplier','NotabeliController@get_supplier');
$router->get('/pengirim','NotabeliController@get_pengirim');
$router->get('/rekening','NotabeliController@get_rekening');
$router->get('/pelanggan','NotabeliController@get_pelanggan');



