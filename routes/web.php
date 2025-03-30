<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\ManagementUserController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;

// Route untuk mengambil semua user
// Route::get('/user', [ManagementUserController::class, 'index']);
// Route::get('/user/create', [ManagementUserController::class, 'create']);
// Route::post('/user', [ManagementUserController::class, 'store']);
// Route::get('/user/{id}', [ManagementUserController::class, 'show']);
// Route::get('/user/{id}/edit', [ManagementUserController::class, 'edit']);
// Route::put('/user/{id}', [ManagementUserController::class, 'update']);
// Route::delete('/user/{id}', [ManagementUserController::class, 'destroy']);

Route::get("/home", function () {
    return view("home");
});

// Route Home dan Dashboard
Route::resource('home', HomeController::class);
Route::resource('dashboard', DashboardController::class);

// Pengalaman Kerja
Route::resource('pengalaman_kerja', PengalamanKerjaController::class);

// Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

//pendidikan
Route::resource('pendidikan', PendidikanController::class);

//session
Route::get('/session/create', [SessionController::class, 'create']);

Route::get('/session/show', [SessionController::class, 'show']);

Route::get('/session/delete', [SessionController::class, 'delete']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);

Route::get('/formulir', [PegawaiController::class, 'formulir']);

Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

Route::get('/cobaerror', [CobaController::class, 'index']);

Route::get('/cobaerror/{nama}', [CobaController::class, 'index']);

//upload file dan gambar
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');

//rezise image
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

//dropdzone
Route::get('/dropzone', [UploadController::class, 'dropzone'])
    ->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])
    ->name('dropzone.store');

//pdf
Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])
    ->name('pdf.upload');
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])
    ->name('pdf.store');
