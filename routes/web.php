<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JenisCutiController;
use App\Http\Controllers\KepalatuController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\PimpinanController;

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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin', [HomeController::class, 'admin']);
    Route::get('admin/data/user', [UserController::class, 'index']);
    Route::get('admin/data/user/create', [UserController::class, 'tambah']);
    Route::post('admin/data/user/create', [UserController::class, 'simpan']);
    Route::get('admin/data/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('admin/data/user/edit/{id}', [UserController::class, 'update']);
    Route::get('admin/data/user/delete/{id}', [UserController::class, 'hapus']);
    Route::get('admin/data/user/cari', [UserController::class, 'cari']);

    Route::get('admin/data/pegawai', [PegawaiController::class, 'index']);
    Route::get('admin/data/pegawai/create', [PegawaiController::class, 'tambah']);
    Route::post('admin/data/pegawai/create', [PegawaiController::class, 'simpan']);
    Route::get('admin/data/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('admin/data/pegawai/edit/{id}', [PegawaiController::class, 'update']);
    Route::get('admin/data/pegawai/delete/{id}', [PegawaiController::class, 'hapus']);
    Route::get('admin/data/pegawai/detail/{id}', [PegawaiController::class, 'detail']);
    Route::get('admin/data/pegawai/cari', [PegawaiController::class, 'cari']);

    Route::get('admin/data/bagian', [BagianController::class, 'index']);
    Route::get('admin/data/bagian/create', [BagianController::class, 'tambah']);
    Route::post('admin/data/bagian/create', [BagianController::class, 'simpan']);
    Route::get('admin/data/bagian/edit/{id}', [BagianController::class, 'edit']);
    Route::post('admin/data/bagian/edit/{id}', [BagianController::class, 'update']);
    Route::get('admin/data/bagian/delete/{id}', [BagianController::class, 'hapus']);
    Route::get('admin/data/bagian/cari', [BagianController::class, 'cari']);

    Route::get('admin/data/golongan', [GolonganController::class, 'index']);
    Route::get('admin/data/golongan/create', [GolonganController::class, 'tambah']);
    Route::post('admin/data/golongan/create', [GolonganController::class, 'simpan']);
    Route::get('admin/data/golongan/edit/{id}', [GolonganController::class, 'edit']);
    Route::post('admin/data/golongan/edit/{id}', [GolonganController::class, 'update']);
    Route::get('admin/data/golongan/delete/{id}', [GolonganController::class, 'hapus']);
    Route::get('admin/data/golongan/cari', [GolonganController::class, 'cari']);

    Route::get('admin/data/jabatan', [JabatanController::class, 'index']);
    Route::get('admin/data/jabatan/create', [JabatanController::class, 'tambah']);
    Route::post('admin/data/jabatan/create', [JabatanController::class, 'simpan']);
    Route::get('admin/data/jabatan/edit/{id}', [JabatanController::class, 'edit']);
    Route::post('admin/data/jabatan/edit/{id}', [JabatanController::class, 'update']);
    Route::get('admin/data/jabatan/delete/{id}', [JabatanController::class, 'hapus']);
    Route::get('admin/data/jabatan/cari', [JabatanController::class, 'cari']);

    Route::get('admin/data/pendidikan', [PendidikanController::class, 'index']);
    Route::get('admin/data/pendidikan/create', [PendidikanController::class, 'tambah']);
    Route::post('admin/data/pendidikan/create', [PendidikanController::class, 'simpan']);
    Route::get('admin/data/pendidikan/edit/{id}', [PendidikanController::class, 'edit']);
    Route::post('admin/data/pendidikan/edit/{id}', [PendidikanController::class, 'update']);
    Route::get('admin/data/pendidikan/delete/{id}', [PendidikanController::class, 'hapus']);
    Route::get('admin/data/pendidikan/cari', [PendidikanController::class, 'cari']);

    Route::get('admin/data/suratmasuk/printdisposisi/{id}', [SuratMasukController::class, 'print_disposisi']);
    Route::get('admin/data/suratmasuk', [SuratMasukController::class, 'index']);
    Route::get('admin/data/suratmasuk/create', [SuratMasukController::class, 'tambah']);
    Route::post('admin/data/suratmasuk/create', [SuratMasukController::class, 'simpan']);
    Route::get('admin/data/suratmasuk/edit/{id}', [SuratMasukController::class, 'edit']);
    Route::post('admin/data/suratmasuk/edit/{id}', [SuratMasukController::class, 'update']);
    Route::get('admin/data/suratmasuk/delete/{id}', [SuratMasukController::class, 'hapus']);
    Route::get('admin/data/suratmasuk/cari', [SuratMasukController::class, 'cari']);
    Route::get('admin/data/suratmasuk/disposisi/{id}', [SuratMasukController::class, 'disposisi']);

    Route::get('admin/data/spt', [SptController::class, 'index']);
    Route::get('admin/data/sptpetugas/delete/{id}', [SptController::class, 'deletePetugas']);
    Route::post('admin/data/spt/simpanpegawai/{id}', [SptController::class, 'simpanPetugas']);
    Route::get('admin/data/spt/create', [SptController::class, 'tambah']);
    Route::post('admin/data/spt/create', [SptController::class, 'simpan']);
    Route::get('admin/data/spt/edit/{id}', [SptController::class, 'edit']);
    Route::post('admin/data/spt/edit/{id}', [SptController::class, 'update']);
    Route::get('admin/data/spt/delete/{id}', [SptController::class, 'hapus']);
    Route::get('admin/data/spt/cetak/{id}', [SptController::class, 'cetak']);
    Route::get('admin/data/spt/cari', [SptController::class, 'cari']);

    Route::get('admin/data/suratkeluar', [SuratKeluarController::class, 'index']);
    Route::get('admin/data/suratkeluar/create', [SuratKeluarController::class, 'tambah']);
    Route::post('admin/data/suratkeluar/create', [SuratKeluarController::class, 'simpan']);
    Route::get('admin/data/suratkeluar/edit/{id}', [SuratKeluarController::class, 'edit']);
    Route::post('admin/data/suratkeluar/edit/{id}', [SuratKeluarController::class, 'update']);
    Route::get('admin/data/suratkeluar/delete/{id}', [SuratKeluarController::class, 'hapus']);
    Route::get('admin/data/suratkeluar/cari', [SuratKeluarController::class, 'cari']);
    Route::get('admin/data/suratkeluar/cetak/{id}', [SuratKeluarController::class, 'cetak']);
    Route::get('admin/data/suratkeluar/disposisi/{id}', [SuratKeluarController::class, 'disposisi']);

    Route::get('admin/data/jeniscuti', [JenisCutiController::class, 'index']);
    Route::get('admin/data/jeniscuti/create', [JenisCutiController::class, 'tambah']);
    Route::post('admin/data/jeniscuti/create', [JenisCutiController::class, 'simpan']);
    Route::get('admin/data/jeniscuti/edit/{id}', [JenisCutiController::class, 'edit']);
    Route::post('admin/data/jeniscuti/edit/{id}', [JenisCutiController::class, 'update']);
    Route::get('admin/data/jeniscuti/delete/{id}', [JenisCutiController::class, 'hapus']);
    Route::get('admin/data/jeniscuti/cari', [JenisCutiController::class, 'cari']);

    Route::get('admin/data/laporan', [LaporanController::class, 'laporan']);
    Route::get('admin/data/laporan/riwayat/surat', [LaporanController::class, 'laporan_riwayat_surat']);
    Route::get('admin/data/laporan/rekapitulasi/surat', [LaporanController::class, 'laporan_rekapitulasi_surat']);
    Route::get('admin/data/laporan/user', [LaporanController::class, 'laporan_user']);
    Route::get('admin/data/laporan/pegawaipns', [LaporanController::class, 'laporan_pegawaipns']);
    Route::get('admin/data/laporan/pegawaitekon', [LaporanController::class, 'laporan_pegawaitekon']);
    Route::get('admin/data/laporan/pegawai', [LaporanController::class, 'laporan_pegawai']);
    Route::get('admin/data/laporan/belumupload', [LaporanController::class, 'laporan_belumupload']);
    Route::get('admin/data/laporan/suratmasuk', [LaporanController::class, 'laporan_suratmasuk']);
    Route::get('admin/data/laporan/suratkeluar', [LaporanController::class, 'laporan_suratkeluar']);
    Route::get('admin/data/laporan/spt', [LaporanController::class, 'laporan_spt']);
});

Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('pegawai', [HomeController::class, 'pegawai']);
    Route::get('pegawai/data/pengajuancuti', [PengajuanCutiController::class, 'index']);
    Route::get('pegawai/data/pengajuancuti/create', [PengajuanCutiController::class, 'tambah']);
    Route::post('pegawai/data/pengajuancuti/create', [PengajuanCutiController::class, 'simpan']);
    Route::get('pegawai/data/pengajuancuti/edit/{id}', [PengajuanCutiController::class, 'edit']);
    Route::post('pegawai/data/pengajuancuti/edit/{id}', [PengajuanCutiController::class, 'update']);
    Route::get('pegawai/data/pengajuancuti/delete/{id}', [PengajuanCutiController::class, 'hapus']);
    Route::get('pegawai/data/pengajuancuti/cari', [PengajuanCutiController::class, 'cari']);

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
});

Route::middleware(['auth', 'role:kepalaTU'])->group(function () {
    Route::get('kepalatu', [HomeController::class, 'kepalatu']);
    Route::get('kepalatu/data/suratmasuk/lihat/{id}', [KepalatuController::class, 'lihat']);
    Route::get('kepalatu/verifikasi/surat-masuk', [KepalatuController::class, 'index']);
    Route::get('kepalatu/data/suratmasuk/disposisi/{id}', [KepalatuController::class, 'disposisi']);

    Route::get('kepalatu/data/suratkeluar/lihat/{id}', [KepalatuController::class, 'lihat_suratkeluar']);
    Route::get('kepalatu/verifikasi/surat-keluar', [KepalatuController::class, 'index_suratkeluar']);
    Route::get('kepalatu/data/suratkeluar/disposisi/{id}', [KepalatuController::class, 'disposisi_suratkeluar']);
    Route::get('kepalatu/data/biodata', [BiodataController::class, 'biodata']);
    Route::post('kepalatu/data/biodata/{id}', [BiodataController::class, 'updateBiodata']);
});

Route::middleware(['auth', 'role:pimpinan'])->group(function () {
    Route::get('pimpinan', [HomeController::class, 'pimpinan']);
    Route::get('pimpinan/data/suratmasuk/lihat/{id}', [PimpinanController::class, 'lihat']);
    Route::get('pimpinan/data/suratmasuk/verifikasi/{id}', [PimpinanController::class, 'verifikasi']);
    Route::post('pimpinan/data/suratmasuk/verifikasi/{id}', [PimpinanController::class, 'update_verifikasi']);
    Route::get('pimpinan/verifikasi/surat-masuk', [PimpinanController::class, 'index']);

    Route::get('pimpinan/data/suratkeluar/lihat/{id}', [PimpinanController::class, 'lihat_suratkeluar']);
    Route::get('pimpinan/data/suratkeluar/verifikasi/{id}', [PimpinanController::class, 'verifikasi_suratkeluar']);
    Route::post('pimpinan/data/suratkeluar/verifikasi/{id}', [PimpinanController::class, 'update_verifikasi_suratkeluar']);
    Route::get('pimpinan/verifikasi/surat-keluar', [PimpinanController::class, 'index_suratkeluar']);

    Route::get('pimpinan/data/biodata', [BiodataController::class, 'biodata']);
    Route::post('pimpinan/data/biodata/{id}', [BiodataController::class, 'updateBiodata']);
});

Route::middleware(['auth', 'role:kepalaPelayanan'])->group(function () {
    Route::get('kepalapelayanan', [HomeController::class, 'kepalapelayanan']);
});
