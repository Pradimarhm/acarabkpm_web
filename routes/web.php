<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\ManagementUserController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;

// Route untuk mengambil semua user
Route::get('/user', [ManagementUserController::class, 'index']);
Route::get('/user/create', [ManagementUserController::class, 'create']);
Route::post('/user', [ManagementUserController::class, 'store']);
Route::get('/user/{id}', [ManagementUserController::class, 'show']);
Route::get('/user/{id}/edit', [ManagementUserController::class, 'edit']);
Route::put('/user/{id}', [ManagementUserController::class, 'update']);
Route::delete('/user/{id}', [ManagementUserController::class, 'destroy']);

Route::get("/home", function() {
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


