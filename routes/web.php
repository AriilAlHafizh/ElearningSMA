<?php

use App\Http\Controllers\admincontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\matericontroller;
use App\Http\Controllers\nilaicontroller;
use App\Http\Controllers\siswacontroller;


//guru
Route::get('/', function () {
    return view('..\guru\dashboardguru');});
Route::get('/materiguru', [matericontroller::class, 'index'])->name('materi.guru');
Route::get('/dashboardguru', [matericontroller::class, 'dashboard'])->name('guru.dashboard');
Route::get('/jadwal', [matericontroller::class, 'jadwal'])->name('jadwal.dashboard');
Route::get('/profile', [matericontroller::class, 'profile'])->name('profile.dashboard');
Route::post('/materiguru', [MateriController::class, 'store'])->name('materi.guru.store');
Route::put('/materiguru/{id}', [MateriController::class, 'update'])->name('materi.guru.update');
Route::delete('/materiguru/{id}', [MateriController::class, 'destroy'])->name('materi.guru.destroy');


//nilai guru
Route::get('/nilai', [nilaicontroller::class, 'create'])->name('nilai.guru'); 
Route::post('/nilai', [nilaicontroller::class, 'storenilai'])->name('nilai.guru.store');


Route::get('/nilaiguru', function () {
    return view('guru\nilaiguru');
});

//siswa 
Route::get('/siswa', function () {
    return view('..\siswa\dashboardsiswa');});
Route::get('/materisiswa', [siswacontroller::class, 'indexsiswa'])->name('materi.siswa');
Route::get('/dashboardsiswa', [siswacontroller::class, 'dashboardsiswa'])->name('siswa.dashboard');
Route::get('/nilaisiswa', [siswacontroller::class, 'nilaisiswa'])->name('nilai.siswa');
Route::get('/jadwalsiswa', [siswacontroller::class, 'jadwalsiswa'])->name('jadwal.siswa');
Route::get('/profilesiswa', [siswacontroller::class, 'profilesiswa'])->name('profile.siswa');
Route::get('/datasiswa', [siswacontroller::class, 'datasiswa'])->name('admin.siswa');
Route::post('/datasiswa', [siswacontroller::class, 'storesiswa'])->name('admin.siswa.store');
Route::put('/datasiswa/{id}', [siswacontroller::class, 'updatesiswa'])->name('admin.siswa.update');
Route::delete('/datasiswa/{id}', [siswacontroller::class, 'destroysiswa'])->name('admin.siswa.destroy');


//admin 
Route::get('/admin', function () {
    return view('..\admin\dashboardadmin');});
Route::get('/materiadmin', [admincontroller::class, 'indexadmin'])->name('materi.admin');
Route::post('/materiadmin', [admincontroller::class, 'materistore'])->name('materi.admin.store');
Route::put('/materiadmin/{id}', [admincontroller::class, 'materiupdate'])->name('materi.admin.update');
Route::delete('/materiadmin/{id}', [admincontroller::class, 'materidestroy'])->name('materi.admin.destroy');
Route::get('/dashboardadmin', [admincontroller::class, 'dashboardadmin'])->name('admin.dashboard');
Route::get('/dataguru', [admincontroller::class, 'dataguru'])->name('admin.guru');
Route::get('/nilaiadmin', [admincontroller::class, 'nilaiadmin'])->name('nilai.admin');
Route::get('/jadwaladmin', [admincontroller::class, 'jadwaladmin'])->name('jadwal.admin');
Route::get('/profileadmin', [admincontroller::class, 'profileadmin'])->name('profile.admin');
Route::post('/dataguru', [admincontroller::class, 'storeguru'])->name('admin.guru.store');
Route::put('/dataguru/{id}', [adminController::class, 'update'])->name('admin.guru.update');
Route::delete('/dataguru/{id}', [adminController::class, 'destroyguru'])->name('admin.guru.destroy');




Route::get('/materi/{id}/download', [MateriController::class, 'download'])->name('materi.download');
