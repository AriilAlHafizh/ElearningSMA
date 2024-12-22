<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;

Route::get('/', function () {
    return view('..\guru\dashboardguru');});
Route::get('/materiguru', [matericontroller::class, 'index'])->name('materi.guru');
Route::get('/materiguru/create', [matericontroller::class, 'create'])->name('materi.guru.create');
Route::get('/dashboard', [matericontroller::class, 'dashboard'])->name('guru.dashboard');
Route::get('/nilai', [matericontroller::class, 'nilai'])->name('nilai.dashboard');
Route::get('/jadwal', [matericontroller::class, 'jadwal'])->name('jadwal.dashboard');
Route::get('/profile', [matericontroller::class, 'profile'])->name('profile.dashboard');
Route::post('/materiguru', [MateriController::class, 'store'])->name('materi.guru.store');

Route::get('/nilaiguru', function () {
    return view('guru\nilaiguru');
});


 