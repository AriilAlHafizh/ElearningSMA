<?php

use App\Http\Controllers\admincontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\matericontroller;
use App\Http\Controllers\siswa;

//guru
Route::get('/', function () {
    return view('..\guru\dashboardguru');});
Route::get('/materiguru', [matericontroller::class, 'index'])->name('materi.guru');
Route::get('/materiguru/create', [matericontroller::class, 'create'])->name('materi.guru.create');
Route::get('/dashboardguru', [matericontroller::class, 'dashboard'])->name('guru.dashboard');
Route::get('/nilai', [matericontroller::class, 'nilai'])->name('nilai.dashboard');
Route::get('/jadwal', [matericontroller::class, 'jadwal'])->name('jadwal.dashboard');
Route::get('/profile', [matericontroller::class, 'profile'])->name('profile.dashboard');
Route::post('/materiguru', [MateriController::class, 'store'])->name('materi.guru.store');

Route::get('/nilaiguru', function () {
    return view('guru\nilaiguru');
});

//siswa 
Route::get('/siswa', function () {
    return view('..\siswa\dashboardsiswa');});
Route::get('/materisiswa', [siswa::class, 'indexsiswa'])->name('materi.siswa');
Route::get('/dashboardsiswa', [siswa::class, 'dashboardsiswa'])->name('siswa.dashboard');
Route::get('/nilaisiswa', [siswa::class, 'nilaisiswa'])->name('nilai.siswa');
Route::get('/jadwalsiswa', [siswa::class, 'jadwalsiswa'])->name('jadwal.siswa');
Route::get('/profilesiswa', [siswa::class, 'profilesiswa'])->name('profile.siswa');

//admin 
Route::get('/admin', function () {
    return view('..\admin\dashboardadmin');});
Route::get('/materiadmin', [admincontroller::class, 'indexadmin'])->name('materi.admin');
Route::get('/dashboardadmin', [admincontroller::class, 'dashboardadmin'])->name('admin.dashboard');
Route::get('/dataguru', [admincontroller::class, 'dataguru'])->name('admin.guru');
Route::get('/datasiswa', [admincontroller::class, 'datasiswa'])->name('admin.siswa');
Route::get('/nilaiadmin', [admincontroller::class, 'nilaiadmin'])->name('nilai.admin');
Route::get('/jadwaladmin', [admincontroller::class, 'jadwaladmin'])->name('jadwal.admin');
Route::get('/profileadmin', [admincontroller::class, 'profileadmin'])->name('profile.admin');


 