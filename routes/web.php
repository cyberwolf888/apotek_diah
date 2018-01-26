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

    //Product
    Route::group(['prefix' => 'product', 'as'=>'.product'], function() {
        Route::get('/', 'Backend\ProductController@index')->name('.manage');
        Route::get('/create', 'Backend\ProductController@create')->name('.create');
        Route::post('/create', 'Backend\ProductController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\ProductController@update')->name('.update');
        Route::get('/gallery/manage/{id}', 'Backend\ProductController@manage_gallery')->name('.gallery.manage');
        Route::get('/gallery/create/{id}', 'Backend\ProductController@create_gallery')->name('.gallery.create');
        Route::post('/gallery/create/{id}', 'Backend\ProductController@store_gallery')->name('.gallery.store');
        Route::get('/gallery/delete/{id}', 'Backend\ProductController@destroy_gallery')->name('.gallery.destroy');
        Route::get('/detail/{id}', 'Backend\ProductController@show')->name('.show');
    });

    //Transaction
    Route::group(['prefix' => 'transaction', 'as'=>'.transaction'], function() {
        Route::get('/', 'Backend\TransactionController@index')->name('.manage');
        Route::get('/detail/{id}', 'Backend\TransactionController@show')->name('.show');
        Route::post('/approve', 'Backend\TransactionController@approve')->name('.approve');
        Route::post('/decline', 'Backend\TransactionController@decline')->name('.decline');
        Route::post('/shipped', 'Backend\TransactionController@shipped')->name('.shipped');
        Route::post('/finish', 'Backend\TransactionController@finish')->name('.finish');
        Route::post('/cancel', 'Backend\TransactionController@cancel')->name('.cancel');
    });

    //User
    Route::group(['prefix' => 'user', 'as'=>'.user'], function() {

        //Admin
        Route::group(['prefix' => 'admin', 'as'=>'.admin'], function() {
            Route::get('/', 'Backend\UserController@admin')->name('.manage');
            Route::get('/create', 'Backend\UserController@create_admin')->name('.create');
            Route::post('/create', 'Backend\UserController@store_admin')->name('.store');
            Route::get('/edit/{id}', 'Backend\UserController@edit_admin')->name('.edit');
            Route::post('/edit/{id}', 'Backend\UserController@update_admin')->name('.update');
        });

        //Owner
        Route::group(['prefix' => 'owner', 'as'=>'.owner'], function() {
            Route::get('/', 'Backend\UserController@owner')->name('.manage');
            Route::get('/create', 'Backend\UserController@create_owner')->name('.create');
            Route::post('/create', 'Backend\UserController@store_owner')->name('.store');
            Route::get('/edit/{id}', 'Backend\UserController@edit_owner')->name('.edit');
            Route::post('/edit/{id}', 'Backend\UserController@update_owner')->name('.update');
        });

        //Member
        Route::group(['prefix' => 'member', 'as'=>'.member'], function() {
            Route::get('/', 'Backend\UserController@member')->name('.manage');
            Route::get('/create', 'Backend\UserController@create_member')->name('.create');
            Route::post('/create', 'Backend\UserController@store_member')->name('.store');
            Route::get('/edit/{id}', 'Backend\UserController@edit_member')->name('.edit');
            Route::post('/edit/{id}', 'Backend\UserController@update_member')->name('.update');
        });

    });

    //Report
    Route::group(['prefix' => 'report', 'as'=>'.report'], function() {
        Route::get('/', 'Backend\ReportController@index')->name('.index');
        Route::post('/transaction', 'Backend\ReportController@transaction')->name('.transaction');
    });

    //Grafik
    Route::group(['prefix' => 'grafik', 'as'=>'.grafik'], function() {
        Route::get('/all', 'Backend\GrafikController@all')->name('.all');
        Route::post('/result_all', 'Backend\GrafikController@result_all')->name('.result_all');
        Route::get('/local', 'Backend\GrafikController@local')->name('.local');
        Route::post('/result_local', 'Backend\GrafikController@result_local')->name('.result_local');
        Route::get('/impor', 'Backend\GrafikController@impor')->name('.impor');
        Route::post('/result_impor', 'Backend\GrafikController@result_impor')->name('.result_impor');
    });

    //Promotion
    Route::group(['prefix' => 'promotion', 'as'=>'.promotion'], function() {
        Route::get('/', 'Backend\PromotionController@index')->name('.index');
        Route::post('/process', 'Backend\PromotionController@process')->name('.process');
        Route::get('/delete/{id}', 'Backend\PromotionController@delete')->name('.delete');
    });

    //Setting
    Route::group(['prefix' => 'setting', 'as'=>'.setting'], function() {
        Route::get('/', 'Backend\SettingController@index')->name('.manage');
        Route::get('/create', 'Backend\SettingController@create')->name('.create');
        Route::post('/create', 'Backend\SettingController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\SettingController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\SettingController@update')->name('.update');
        Route::get('/delete/{id}', 'Backend\SettingController@destroy')->name('.delete');
    });

    //Profile
    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Backend\ProfileController@index')->name('.index');
        Route::post('/edit/{id}', 'Backend\ProfileController@update')->name('.update');
    });

});

