<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/costumer', 'Costumer@index');
Route::post('/tambahCostumer', 'Costumer@tambahCostumer');
Route::get('/updateCostumer/{id}', 'Costumer@updateView');
Route::post('/updateCostumer/proses', 'Costumer@update');
Route::get('/deleteCostumer/{id}', 'Costumer@delete');

//barnag
Route::get('/barang', 'Barang@index');
Route::post('/tambahBarang', 'Barang@tambahBarang');
Route::get('/updateBarang/{id}', 'Barang@updateView');
Route::post('/updateBarang/proses', 'Barang@update');
Route::get('/deleteBarang/{id}', 'Barang@delete');

//transaksi
Route::get('/transaksi', 'Transaksi@index');
Route::post('/tambahTransaksi', 'Transaksi@tambahTransaksi');
Route::get('/updateTransaksi/{id}', 'Transaksi@updateView');
Route::post('/updateTransaksi/proses', 'Transaksi@update');
Route::get('/deleteTransaksi/{id}', 'Transaksi@delete');