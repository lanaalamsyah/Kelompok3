<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;

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
    return view('landing', [
        "title" => "Home"
    ]);
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('admin/home', 'App\Http\Controllers\HomeController@handleAdmin')->name('admin.route')->middleware('admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pesanan/{id}', [App\Http\Controllers\SewaController::class, 'index']);
Route::post('/pesanan/{id}', [App\Http\Controllers\SewaController::class, 'pesanan']);

Route::get('/about', function () {
    return view('About', [
        "title" => "About"
    ]);
});
Route::get('/contact', function () {
    return view('Contact',[
        "title" => "Contact"
    ]);
});
Route::get('/blog', function () {

    return view('Posts',[
        "title" => "Posts"
    ]);
});

Route::get('/categories', function () {
    return view('Categories',[
        "title" => "Categories"
    ]);
});
Route::get('/formulir', function () {
    return view('Formulir',[
        "title" => "Formulir"
    ]);
});
Route::post('/formulir', 'App\Http\Controllers\LaporanController@formulir');
Route::get('/detail', function () {
    return view('/layouts/detail',[
        "title" => "Detail"
    ]);
});

Route::get('/transaksi', function () {
    return view('/layouts/transaksi',[
        "title" => "Transaksi"
    ]);
});
//alat
Route::get('/tambah', function () {
    return view('/alat/tambah',[
    ]);
});
Route::get('/alat', 'App\Http\Controllers\AdminController@index');
Route::get('/alat/tambah','App\Http\Controllers\AdminController@create');
Route::get('/alat/edit/{id}', 'App\Http\Controllers\AdminController@edit');
Route::post('/alat/update', 'App\Http\Controllers\AdminController@update');
Route::get('/alat/destroy/{id}', 'App\Http\Controllers\AdminController@destroy');
Route::post('/alat/store', 'App\Http\Controllers\AdminController@store');
Route::resource('/transaksi', 'App\Http\Controllers\TransaksiController');

//laporan
// form laporan
Route::get('laporan', 'App\Http\Controllers\LaporanController@index');
// proses laporan
Route::get('proseslaporan', 'App\Http\Controllers\LaporanController@proses');

Route::resource('transaksi', 'App\Http\Controllers\TransaksiController');

//Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
//Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.dashboard');
    })    ->middleware('auth');

     // profil
  Route::get('profil', 'App\Http\Controllers\UserController@index');
  // setting profil
  Route::get('setting', 'App\Http\Controllers\UserController@setting');

Route::get('kategori/alat', 'App\Http\Controllers\AdminController@showAlat');

//check-out
Route::get('check-out', 'App\Http\Controllers\SewaController@check_out');
Route::delete('check-out/', 'App\Http\Controllers\SewaController@delete');
//konfirmasi check-out
Route::get('konfirmasi-check-out/{id}', 'App\Http\Controllers\SewaController@konfirmasi');

//profile
Route::get('profil', 'App\Http\Controllers\ProfilController@index');
Route::post('profil', 'App\Http\Controllers\ProfilController@update');

//History
Route::get('history', 'App\Http\Controllers\HistoryController@index');
Route::get('history/{id}', 'App\Http\Controllers\HistoryController@detail');
Route::post("/confirm_bayar", 'App\Http\Controllers\TransaksiController@confirm_bayar');