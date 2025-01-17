<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

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

Route::get('admin/data/suratmasuk', [SuratMasukController::class, 'index']);
Route::get('admin/data/suratmasuk/create', [SuratMasukController::class, 'tambah']);
Route::post('admin/data/suratmasuk/create', [SuratMasukController::class, 'simpan']);
Route::get('admin/data/suratmasuk/edit/{id}', [SuratMasukController::class, 'edit']);
Route::post('admin/data/suratmasuk/edit/{id}', [SuratMasukController::class, 'update']);
Route::get('admin/data/suratmasuk/delete/{id}', [SuratMasukController::class, 'hapus']);

Route::get('admin/data/spt', [SptController::class, 'index']);
Route::get('admin/data/sptpetugas/delete/{id}', [SptController::class, 'deletePetugas']);
Route::post('admin/data/spt/simpanpegawai/{id}', [SptController::class, 'simpanPetugas']);
Route::get('admin/data/spt/create', [SptController::class, 'tambah']);
Route::post('admin/data/spt/create', [SptController::class, 'simpan']);
Route::get('admin/data/spt/edit/{id}', [SptController::class, 'edit']);
Route::post('admin/data/spt/edit/{id}', [SptController::class, 'update']);
Route::get('admin/data/spt/delete/{id}', [SptController::class, 'hapus']);
Route::get('admin/data/spt/cetak/{id}', [SptController::class, 'cetak']);

Route::get('admin/data/suratkeluar', [SuratKeluarController::class, 'index']);
Route::get('admin/data/suratkeluar/create', [SuratKeluarController::class, 'tambah']);
Route::post('admin/data/suratkeluar/create', [SuratKeluarController::class, 'simpan']);
Route::get('admin/data/suratkeluar/edit/{id}', [SuratKeluarController::class, 'edit']);
Route::post('admin/data/suratkeluar/edit/{id}', [SuratKeluarController::class, 'update']);
Route::get('admin/data/suratkeluar/delete/{id}', [SuratKeluarController::class, 'hapus']);

Route::get('admin/data/laporan', [LaporanController::class, 'laporan']);
Route::get('admin/data/laporan/pegawaipns', [LaporanController::class, 'laporan_pegawaipns']);
Route::get('admin/data/laporan/pegawaitekon', [LaporanController::class, 'laporan_pegawaitekon']);
Route::get('admin/data/laporan/pegawai', [LaporanController::class, 'laporan_pegawai']);
Route::get('admin/data/laporan/belumupload', [LaporanController::class, 'laporan_belumupload']);

Route::get('admin/data/laporan/suratmasuk', [LaporanController::class, 'laporan_suratmasuk']);
Route::get('admin/data/laporan/suratkeluar', [LaporanController::class, 'laporan_suratkeluar']);
Route::get('admin/data/laporan/spt', [LaporanController::class, 'laporan_spt']);

Route::get('pegawai/data/upload', [UploadController::class, 'upload']);
Route::post('pegawai/upload/lamarankerja', [UploadController::class, 'uploadlamarankerja']);
Route::post('pegawai/upload/ktp', [UploadController::class, 'uploadktp']);
Route::post('pegawai/upload/kk', [UploadController::class, 'uploadkk']);
Route::post('pegawai/upload/ijazah', [UploadController::class, 'uploadijazah']);
Route::post('pegawai/upload/sertifikat', [UploadController::class, 'uploadsertifikat']);
Route::post('pegawai/upload/spk', [UploadController::class, 'uploadspk']);
Route::post('pegawai/upload/foto', [UploadController::class, 'uploadfoto']);

Route::get('pegawai/data/biodata', [BiodataController::class, 'biodata']);
Route::post('pegawai/data/biodata/{id}', [BiodataController::class, 'updateBiodata']);
Route::get('admin/data/user/cari', [UserController::class, 'cari']);
Route::get('admin/data/pegawai/cari', [PegawaiController::class, 'cari']);
Route::get('admin/data/jabatan/cari', [JabatanController::class, 'cari']);
Route::get('admin/data/pendidikan/cari', [PendidikanController::class, 'cari']);
Route::get('admin/data/pegawai/detail/{id}', [PegawaiController::class, 'detail']);