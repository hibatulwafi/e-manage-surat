<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return redirect(route('login'));
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function(){


    //Manajemen Rak
    Route::get('/rak','RakController@index')->name('rak.index');
    Route::get('/tambahrak','RakController@create')->name('rak.create');
    Route::post('/store/rak','RakController@store')->name('rak.store');
    Route::get('/edit/rak/{id}','RakController@edit')->name('rak.edit');
    Route::put('/update/rak','RakController@update')->name('rak.update');
    Route::delete('/delete/rak/{id}','RakController@destroy')->name('rak.destroy');

    //Manajemen Arsip
    Route::get('/arsip','ArsipController@index')->name('arsip.index');
    Route::get('/tambaharsip','ArsipController@create')->name('arsip.create');
    Route::post('/store/arsip','ArsipController@store')->name('arsip.store');
    Route::get('/edit/arsip/{id}','ArsipController@edit')->name('arsip.edit');
    Route::put('/update/arsip','ArsipController@update')->name('arsip.update');
    Route::delete('/delete/arsip/{id}','ArsipController@destroy')->name('arsip.destroy');

    //Peminjaman
    Route::get('/transaksi','PeminjamanController@transaksi')->name('transaksi.index');
    Route::get('/transaksi/create','PeminjamanController@transaksi_create')->name('transaksi.create');
    Route::post('/transaksi/store','PeminjamanController@transaksi_store')->name('transaksi.store');

    Route::get('/approval','PeminjamanController@approval')->name('approval.index');
    Route::get('/terima/approval/{id}','PeminjamanController@approval_terima')->name('approval.terima');
    Route::get('/tolak/approval/{id}','PeminjamanController@approval_tolak')->name('approval.tolak');


    Route::get('/history','PeminjamanController@history')->name('history.index');


    //settings
    Route::group(['middleware' => ['role:admin']], function() {
        Route::resource('setting', 'SettingController');        
    });

    
    Route::group(['middleware' => ['permission:manajemen users|manajemen roles']], function() {
        Route::get('/roles/search','RoleController@search')->name('roles.search');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        // Route::resource('setting', 'SettingController');        
    });

   
    // under development
    Route::group(['middleware' => ['permission:manajemen arsip']], function() {         
    });
    
    //profile
    Route::resource('/profile', 'ProfileController');

    Route::get('/home', 'HomeController@index')->name('home');
});

