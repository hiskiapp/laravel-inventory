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


Auth::routes(['register' => false]);

Route::group(['middleware' => 'cekLogin'], function () use ($router) {
    Route::get('/', 'DashboardController@dashboard');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::group(['prefix' => 'ruang'], function () use ($router) {
        $router->get('/', 'RuangController@index')->name('ruang.index');
        $router->post('/store', 'RuangController@store')->name('ruang.store');
        $router->get('/{id}', 'RuangController@find')->name('ruang.find');
        $router->post('/update', 'RuangController@update')->name('ruang.update');
        $router->get('/delete/{id}', 'RuangController@delete')->name('ruang.delete');
    });
    Route::group(['prefix' => 'pegawai'], function () use ($router) {
        $router->get('/', 'PegawaiController@index')->name('pegawai.index');
        $router->post('/store', 'PegawaiController@store')->name('pegawai.store');
        $router->get('/{id}', 'PegawaiController@find')->name('pegawai.find');
        $router->post('/update', 'PegawaiController@update')->name('pegawai.update');
        $router->get('/delete/{id}', 'PegawaiController@delete')->name('pegawai.delete');
    });
    Route::group(['prefix' => 'jenis'], function () use ($router) {
        $router->get('/', 'JenisController@index')->name('jenis.index');
        $router->post('/store', 'JenisController@store')->name('jenis.store');
        $router->get('/{id}', 'JenisController@find')->name('jenis.find');
        $router->post('/update', 'JenisController@update')->name('jenis.update');
        $router->get('/delete/{id}', 'JenisController@delete')->name('jenis.delete');
    });
    Route::group(['prefix' => 'inventaris'], function () use ($router) {
        $router->get('/', 'InventarisController@index')->name('inventaris.index');
        $router->post('/store', 'InventarisController@store')->name('inventaris.store');
        $router->post('/delete', 'InventarisController@delete')->name('inventaris.delete');
    });
    Route::group(['prefix' => 'peminjaman'], function () use ($router) {
        $router->get('/', 'PeminjamanController@index')->name('peminjaman.index');
        $router->get('/{id}/inventory', 'PeminjamanController@findInventaris')->name('peminjaman.find_inventaris');
        $router->get('/{id}/pegawai', 'PeminjamanController@findPegawai')->name('peminjaman.find_pegawai');
        $router->post('/store/detailPinjam', 'PeminjamanController@storeDetail')->name('peminjaman.store_detail');
        $router->post('/store/peminjaman', 'PeminjamanController@storePinjam')->name('peminjaman.store_pinjam');
        $router->get('/delete/{id}', 'PeminjamanController@destroy')->name('peminjaman.destroy');
    });
    Route::group(['prefix' => 'pengembalian'], function () use ($router) {
        $router->get('/', 'PengembalianController@index')->name('pengembalian.index');
        $router->get('/{id}/detail', 'PengembalianController@detail')->name('pengembalian.detail');
        $router->get('/{id}/kembalikan', 'PengembalianController@kembalikan')->name('pengembalian.kembalikan');
    });
    Route::group(['prefix' => 'petugas'], function () use ($router) {
        $router->get('/', 'PetugasController@index')->name('petugas.index');
        $router->post('/store', 'PetugasController@store')->name('petugas.store');
        $router->get('/{id}', 'PetugasController@find')->name('petugas.find');
        $router->post('/update', 'PetugasController@update')->name('petugas.update');
        $router->get('/delete/{id}', 'PetugasController@delete')->name('petugas.delete');
    });
    Route::group(['prefix' => 'laporan'], function () use ($router) {
        $router->get('/', 'LaporanController@index')->name('laporan.index');
        $router->get('/print', 'LaporanController@print')->name('laporan.print');
    });
});
