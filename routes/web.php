<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendidikanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Login');
});
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);
Route::get('admin', [HomeController::class, 'admin']);
Route::get('pegawai', [HomeController::class, 'pegawai']);

Route::get('admin/data/user', [UserController::class, 'index']);
Route::get('admin/data/user/create', [UserController::class, 'tambah']);
Route::post('admin/data/user/create', [UserController::class, 'simpan']);
Route::get('admin/data/user/edit/{id}', [UserController::class, 'edit']);
Route::post('admin/data/user/edit/{id}', [UserController::class, 'update']);
Route::get('admin/data/user/delete/{id}', [UserController::class, 'hapus']);

Route::get('admin/data/pegawai', [PegawaiController::class, 'index']); 
Route::get('admin/data/pegawai/create', [PegawaiController::class, 'tambah']);
Route::post('admin/data/pegawai/create', [PegawaiController::class, 'simpan']);
Route::get('admin/data/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
Route::post('admin/data/pegawai/edit/{id}', [PegawaiController::class, 'update']);
Route::get('admin/data/pegawai/delete/{id}', [PegawaiController::class, 'hapus']);

Route::get('admin/data/jabatan', [JabatanController::class, 'index']);
Route::get('admin/data/jabatan/create', [JabatanController::class, 'tambah']);
Route::post('admin/data/jabatan/create', [JabatanController::class, 'simpan']);
Route::get('admin/data/jabatan/edit/{id}', [JabatanController::class, 'edit']);
Route::post('admin/data/jabatan/edit/{id}', [JabatanController::class, 'update']);
Route::get('admin/data/jabatan/delete/{id}', [JabatanController::class, 'hapus']);

Route::get('admin/data/pendidikan', [PendidikanController::class, 'index']);
Route::get('admin/data/pendidikan/create', [PendidikanController::class, 'tambah']);
Route::post('admin/data/pendidikan/create', [PendidikanController::class, 'simpan']);
Route::get('admin/data/pendidikan/edit/{id}', [PendidikanController::class, 'edit']);
Route::post('admin/data/pendidikan/edit/{id}', [PendidikanController::class, 'update']);
Route::get('admin/data/pendidikan/delete/{id}', [PendidikanController::class, 'hapus']);