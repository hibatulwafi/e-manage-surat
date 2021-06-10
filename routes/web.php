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
    


    //Siswa
    Route::get('/siswa','SiswaController@index')->name('siswa.index');
    Route::get('/siswa/tambah','SiswaController@create')->name('siswa.create');
    Route::post('/siswa/store','SiswaController@store')->name('siswa.store');
    Route::get('/siswa/edit/{id}','SiswaController@edit')->name('siswa.edit');
    Route::put('/siswa/update','SiswaController@update')->name('siswa.update');
    Route::delete('/siswa/delete/{id}','SiswaController@destroy')->name('siswa.destroy');
    //Guru
    Route::get('/guru','GuruController@index')->name('guru.index');
    Route::get('/guru/tambah','GuruController@create')->name('guru.create');
    Route::post('/guru/store','GuruController@store')->name('guru.store');
    Route::get('/guru/edit/{id}','GuruController@edit')->name('guru.edit');
    Route::put('/guru/update','GuruController@update')->name('guru.update');
    Route::delete('/guru/delete/{id}','GuruController@destroy')->name('guru.destroy');

    //Manajemen Rak
    Route::group(['middleware' => ['permission:manajemen rak']], function() {
        Route::get('/rak','RakController@index')->name('rak.index');
        Route::get('/rak/tambah','RakController@create')->name('rak.create');
        Route::post('/rak/store','RakController@store')->name('rak.store');
        Route::get('/rak/edit/{id}','RakController@edit')->name('rak.edit');
        Route::put('/rak/update','RakController@update')->name('rak.update');
        Route::delete('/rak/delete/{id}','RakController@destroy')->name('rak.destroy');
    });

    //Manajemen Arsip
    Route::group(['middleware' => ['permission:manajemen arsip']], function() {
        Route::get('/surat','ArsipController@index')->name('surat.index');
        Route::get('/surat/tambah','ArsipController@create')->name('surat.create');
        Route::post('/surat/store','ArsipController@store')->name('surat.store');
        Route::get('/surat/edit/{id}','ArsipController@edit')->name('surat.edit');
        Route::put('/surat/update','ArsipController@update')->name('surat.update');
        Route::delete('/surat/delete/{id}','ArsipController@destroy')->name('surat.destroy');
    });

    //Transaksi
    Route::group(['middleware' => ['permission:manajemen transaksi']], function() {
     /*   Route::get('/transaksi','PeminjamanController@transaksi')->name('transaksi.index');
        Route::get('/transaksi/create','PeminjamanController@transaksi_create')->name('transaksi.create');
        Route::post('/transaksi/store','PeminjamanController@transaksi_store')->name('transaksi.store');*/
        // Approval
        Route::get('/approval','PengajuanController@approval')->name('approval.index');
        Route::post('/terima/approval/{id}','PengajuanController@approval_terima')->name('approval.terima');
        Route::get('/tolak/approval/{id}','PengajuanController@approval_tolak')->name('approval.tolak');
        Route::post('/terima/approvalket/{id}','PengajuanController@approval_terima2')->name('approvalket.terima');
        Route::get('/tolak/approvalket/{id}','PengajuanController@approval_tolak2')->name('approvalket.tolak');
        Route::get('/riwayat/approval','PengajuanController@riwayatapproval')->name('approval.riwayat');

        //Pengembalian Arsip
/*        Route::post('/transaksi/kembali/{id}','PeminjamanController@transaksi_kembali')->name('transaksi.kembali');
*/        //Riwayat Peminjaman
        Route::get('/history','PeminjamanController@history')->name('history.index');
    });

    //Peminjaman
    Route::group(['middleware' => ['permission:manajemen peminjaman']], function() {
        Route::get('/peminjaman','PeminjamanController@peminjaman_user')->name('peminjaman.user');
        Route::get('/peminjaman/create','PeminjamanController@peminjaman_create')->name('peminjaman.create');
        Route::post('/peminjaman/pinjam/{id}','PeminjamanController@peminjaman_post')->name('peminjaman.pinjam');
        Route::get('/riwayat','PeminjamanController@riwayat_user')->name('riwayat.user');
    });

  

    //Membuat Surat
    Route::get('/surattugas/create','SuratController@surattugas')->name('create.surattugas');
    Route::get('/keterangan/create','SuratController@keterangan')->name('create.keterangan');
    //Cetak Surat
    Route::post('/surattugas/post','SuratController@post_surattugas')->name('post.surattugas');
    Route::post('/keterangan/post','SuratController@post_keterangan')->name('post.keterangan');
    //Ajax Request
    Route::get('get/siswa/{id}', 'SuratController@getSiswa')->name('getSiswa');
    Route::get('get/guru/{id}', 'SuratController@getGuru')->name('getGuru');

    //Cetak Surat DOMPDF
    Route::get('/cetak/tugas','CetakController@surattugas')->name('cetak.tugas');
    Route::get('/cetak/keterangan','CetakController@suratketerangan')->name('cetak.keterangan');

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

    //profile
    Route::resource('/profile', 'ProfileController');

    Route::get('/home', 'HomeController@index')->name('home');

    //Pengajuan
    Route::group(['middleware' => ['permission:manajemen pengajuan']], function() {
        Route::get('/pengajuan/surattugas','PengajuanController@surattugas')->name('pengajuan.surattugas');
        Route::post('/pengajuan/surattugas/post','PengajuanController@surattugaspost')->name('pengajuan.surattugas.post');
        Route::get('/pengajuan/keterangan','PengajuanController@keterangan')->name('pengajuan.keterangan');
        Route::post('/pengajuan/keterangan/post','PengajuanController@keteranganpost')->name('pengajuan.keterangan.post');

        Route::get('/status/pengajuan','PengajuanController@status')->name('pengajuan.status');
        Route::get('/riwayat/pengajuan','PengajuanController@riwayat')->name('pengajuan.riwayat');

        //Download Surat
        Route::get('/surattugas/download/{id}','PengajuanController@download_surattugas')->name('download.surattugas');
        Route::get('/keterangan/download/{id}','PengajuanController@download_keterangan')->name('download.keterangan');



    });


});

Route::get('/updated-activity', 'TelegramBotController@updatedActivity');
Route::get('/telegram',  'TelegramBotController@sendMessage');
Route::post('/send-message','TelegramBotController@storeMessage');
Route::get('/send-photo','TelegramBotController@sendPhoto');
Route::post('/store-photo','TelegramBotController@storePhoto');


Route::post('getuser','UserController@getuser');