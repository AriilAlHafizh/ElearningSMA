<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\matericontroller;
use App\Http\Controllers\nilaicontroller;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\jadwalcontroller;
use App\Http\Controllers\logincontroller;


Route::get('/', [logincontroller::class, 'index'])->name('login');
Route::post('/login', [logincontroller::class, 'login'])->name('proses_login');
Route::middleware('auth')->group(function () {
    Route::post('/logout', [logincontroller::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/', [matericontroller::class, 'dashboard'])->name('dashboard');
    Route::get('/jadwal', [matericontroller::class, 'jadwal'])->name('jadwal');
    Route::get('/profile', [matericontroller::class, 'profile'])->name('profile');
    Route::get('/materi', [matericontroller::class, 'index'])->name('materi');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::put('/materi/{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
    Route::get('/nilai', [nilaicontroller::class, 'create'])->name('nilai'); 
    Route::post('/nilai', [nilaicontroller::class, 'storenilai'])->name('nilai.store');
    Route::put('/nilai/{id}', [nilaicontroller::class, 'updatenilai'])->name('nilai.update');
    Route::delete('/nilai/{id}', [nilaicontroller::class, 'destroynilai'])->name('nilai.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [admincontroller::class, 'dashboardadmin'])->name('dashboard');
    Route::get('/nilai', [admincontroller::class, 'nilaiadmin'])->name('nilai');
    Route::post('/nilai', [admincontroller::class, 'storenilaiadmin'])->name('nilai.store');
    Route::put('/nilai/{id}', [admincontroller::class, 'updatenilaiadmin'])->name('nilai.update');
    Route::delete('/nilai/{id}', [admincontroller::class, 'destroynilaiadmin'])->name('nilai.destroy');
    Route::get('/materi', [admincontroller::class, 'indexadmin'])->name('materi');
    Route::post('/materi', [admincontroller::class, 'materistore'])->name('materi.store');
    Route::put('/materi/{id}', [admincontroller::class, 'materiupdate'])->name('materi.update');
    Route::delete('/materi/{id}', [admincontroller::class, 'materidestroy'])->name('materi.destroy');
    Route::get('/dataguru', [admincontroller::class, 'dataguru'])->name('guru');
    Route::post('/dataguru', [admincontroller::class, 'storeguru'])->name('guru.store');
    Route::put('/dataguru/{id}', [adminController::class, 'update'])->name('guru.update');
    Route::delete('/dataguru/{id}', [adminController::class, 'destroyguru'])->name('guru.destroy');
    Route::get('/jadwal', [jadwalcontroller::class, 'jadwaladmin'])->name('jadwal');
    Route::post('/jadwal', [jadwalcontroller::class, 'storejadwal'])->name('jadwal.store');
    Route::put('/jadwal/{id}', [jadwalController::class, 'updatejadwal'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [jadwalController::class, 'destroyjadwal'])->name('jadwal.destroy');
    Route::get('/data', [siswacontroller::class, 'datasiswa'])->name('siswa');
    Route::post('/data', [siswacontroller::class, 'storesiswa'])->name('siswa.store');
    Route::put('/data/{id}', [siswacontroller::class, 'updatesiswa'])->name('siswa.update');
    Route::delete('/data/{id}', [siswacontroller::class, 'destroysiswa'])->name('siswa.destroy');
    Route::get('/materiadmin/{id}/download', [AdminController::class, 'downloadadmin'])->name('materi.download');
});





Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/', [siswacontroller::class, 'dashboardsiswa'])->name('dashboard');
    Route::get('/materi', [siswacontroller::class, 'indexsiswa'])->name('materi');
    Route::get('/nilai', [siswacontroller::class, 'nilaisiswa'])->name('nilai');
    Route::get('/jadwal', [siswacontroller::class, 'jadwalsiswa'])->name('jadwal');
    Route::get('/profile', [siswacontroller::class, 'profilesiswa'])->name('profile');
    Route::get('/data', [siswacontroller::class, 'datasiswa'])->name('data');
    Route::post('/data', [siswacontroller::class, 'storesiswa'])->name('data.store');
    Route::put('/data/{id}', [siswacontroller::class, 'updatesiswa'])->name('data.update');
    Route::get('/materiguru/{id}/download', [MateriController::class, 'download'])->name('materi.download');
});

// Route::get('/login', [logincontroller::class, 'indexlogin'])->name('login');


// Route::get('/nilaiguru', function () {
//     return view('guru\nilaiguru');
// });
