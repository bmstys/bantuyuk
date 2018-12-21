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

//UNTUK PENGUNJUNG
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// UNTUK NAMPILIN GAMBARNYA

// Route::get('/coba/{id}', function ($id) {
// 	$bukti = App\Donasi::find($id)->bukti;
// 	dd(asset('storage/'.$bukti));
// 	echo "<img src='". asset('storage/'.$bukti) ."'>";
// });

// UNTUK ALERT
Route::get('/proses_login', 'BpbdController@AlertLoginBpbd');
Route::get('/proses_login_donatur', 'DonaturController@AlertLoginDonatur');
Route::get('/proses_registrasi', 'AlertController@AlertRegistrasi');

// UNTUK DONATUR
Route::get('/home', 'DonaturController@tampilHome');
Route::get('/menu', 'DonaturController@tampilMenu');
Route::get('/profil', 'DonaturController@tampilProfil');
Route::put('/profil/{id}', 'DonaturController@editProfile');
Route::post('/profile/password', 'DonaturController@editPassword');
Route::get('/riwayat', 'DonaturController@tampilRiwayat');
Route::get('/detail/{id}', 'DonaturController@tampilDetailRiwayat');
Route::get('/donasi', 'DonaturController@tampilDonasi');
Route::get('/donasi/jenis/{id}', 'DonaturController@tampilJenisDonasi');
Route::get('/donasi/jenis/uang/{id}', 'DonaturController@tampilDonasiUang');
Route::post('/donasiuang/{id}', 'DonaturController@donasiUang');
Route::get('/donasi/jenis/barang/{id}', 'DonaturController@tampilDonasiBarang');
Route::post('donasi/konfirmasi', 'DonaturController@konfirmasiBarang');
Route::get('/donasi/jenis/barang/konfirmasi/{id}', 'DonaturController@tampilKonfirmasiBarang');
Route::post('/konfirmasi', 'DonaturController@konfirmasi');

// UNTUK BPBD
Route::get('/menubpbd', 'BpbdController@tampilMenu');
Route::get('/bencana', 'BpbdController@tampilBencana');
Route::post('/tambah_bencana', 'BpbdController@tambahBencana');
Route::get('/donasimasuk', 'BpbdController@tampilDonasiMasuk');
Route::get('/detaildonasimasuk/{id}', 'BpbdController@tampilDetailDonasiMasuk');
Route::get('/realisasi', 'BpbdController@tampilRealisasi');
Route::get('/realisasikan/{id}', 'BpbdController@tampilRealisasikan');
Route::post('/konfirmasipencairan/{id}/{tot}', 'BpbdController@tampilKonfirmasiPencairan');
Route::get('/konfirmasipencairan/{id}/{tot}', 'BpbdController@tampilKonfirmasi');
Route::post('/realisasi/{id}', 'BpbdController@konfirmasiPencairan');
Route::get('/realisasiuploadbukti/{id}', 'BpbdController@tampilRealisasiUploadBukti');
Route::post('/uploadbukti/{id}', 'BpbdController@uploadBukti');
Route::put('/terimadonasi/{id}', 'BpbdController@terimaDonasi');

// SCPK
Route::post('/scpk', 'SCPKController@inputanDonatur');
Route::get('/scpk/donasi/{id}', 'SCPKController@donasiScpk');
Route::post('/scpk/donasi/konfirmasi', 'SCPKController@konfirmasiScpk');
Route::get('/scpk/donasi/konfirmasi/{id}', 'SCPKController@konfirmasiBarangScpk');
Route::post('/scpk/konfirmasi', 'SCPKController@konfirmasiScpkAkhir');
