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



Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

//Backend
Route::group(['prefix' => 'backend', 'middleware' => ['auth','role:admin-access|owner-access|karyawan-access'], 'as'=>'backend'], function() {

    //Dashboard
    Route::get('/', 'Backend\DashboardController@index')->name('.dashboard');

    //Satuan
    Route::group(['prefix' => 'satuan', 'as'=>'.satuan'], function() {
        Route::get('/', 'Backend\SatuanController@index')->name('.manage');
        Route::get('/create', 'Backend\SatuanController@create')->name('.create');
        Route::post('/create', 'Backend\SatuanController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\SatuanController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\SatuanController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\SatuanController@show')->name('.show');
    });

    //Suplier
    Route::group(['prefix' => 'suplier', 'as'=>'.suplier'], function() {
        Route::get('/', 'Backend\SuplierController@index')->name('.manage');
        Route::get('/create', 'Backend\SuplierController@create')->name('.create');
        Route::post('/create', 'Backend\SuplierController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\SuplierController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\SuplierController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\SuplierController@show')->name('.show');
    });

    //Item
    Route::group(['prefix' => 'item', 'as'=>'.item'], function() {
        Route::get('/', 'Backend\ItemController@index')->name('.manage');
        Route::get('/create', 'Backend\ItemController@create')->name('.create');
        Route::post('/create', 'Backend\ItemController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\ItemController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\ItemController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\ItemController@show')->name('.show');
    });

    //Pembelian
    Route::group(['prefix' => 'pembelian', 'as'=>'.pembelian'], function() {
        Route::get('/', 'Backend\PembelianController@index')->name('.manage');
        Route::get('/create', 'Backend\PembelianController@create')->name('.create');
        Route::post('/create', 'Backend\PembelianController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\PembelianController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\PembelianController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\PembelianController@show')->name('.show');
    });

    //Penjualan
    Route::group(['prefix' => 'penjualan', 'as'=>'.penjualan'], function() {
        Route::get('/', 'Backend\PenjualanController@index')->name('.manage');
        Route::get('/create', 'Backend\PenjualanController@create')->name('.create');
        Route::post('/create', 'Backend\PenjualanController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\PenjualanController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\PenjualanController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\PenjualanController@show')->name('.show');
        Route::post('/add_item', 'Backend\PenjualanController@add_item')->name('.add_item');
    });

    //Laporan
    Route::group(['prefix' => 'laporan', 'as'=>'.laporan'], function() {
        Route::get('/penjualan', 'Backend\LaporanController@penjualan')->name('.penjualan');
        Route::post('/result_penjualan', 'Backend\LaporanController@result_penjualan')->name('.result_penjualan');
        Route::get('/pembelian', 'Backend\LaporanController@pembelian')->name('.pembelian');
        Route::post('/result_pembelian', 'Backend\LaporanController@result_pembelian')->name('.result_pembelian');
    });

    //User
    Route::group(['prefix' => 'user', 'as'=>'.user'], function() {

        //Pemilik
        Route::group(['prefix' => 'owner', 'as'=>'.owner'], function() {
            Route::get('/', 'Backend\UserController@owner')->name('.manage');
            Route::get('/create', 'Backend\UserController@create_owner')->name('.create');
            Route::post('/create', 'Backend\UserController@store_owner')->name('.store');
            Route::get('/edit/{id}', 'Backend\UserController@edit_owner')->name('.edit');
            Route::post('/edit/{id}', 'Backend\UserController@update_owner')->name('.update');
        });

        //Admin
        Route::group(['prefix' => 'admin', 'as'=>'.admin'], function() {
            Route::get('/', 'Backend\UserController@admin')->name('.manage');
            Route::get('/create', 'Backend\UserController@create_admin')->name('.create');
            Route::post('/create', 'Backend\UserController@store_admin')->name('.store');
            Route::get('/edit/{id}', 'Backend\UserController@edit_admin')->name('.edit');
            Route::post('/edit/{id}', 'Backend\UserController@update_admin')->name('.update');
        });



        //Karyawan
        Route::group(['prefix' => 'karyawan', 'as'=>'.karyawan'], function() {
            Route::get('/', 'Backend\UserController@karyawan')->name('.manage');
            Route::get('/create', 'Backend\UserController@create_karyawan')->name('.create');
            Route::post('/create', 'Backend\UserController@store_karyawan')->name('.store');
            Route::get('/edit/{id}', 'Backend\UserController@edit_karyawan')->name('.edit');
            Route::post('/edit/{id}', 'Backend\UserController@update_karyawan')->name('.update');
        });

    });

    //Profile
    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Backend\ProfileController@index')->name('.index');
        Route::post('/edit/{id}', 'Backend\ProfileController@update')->name('.update');
    });

});

