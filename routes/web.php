<?php
//acara 5
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\DashboardController;

// Route untuk mengambil semua user
Route::get('/user', [ManagementUserController::class, 'index']);

// Route untuk menampilkan form tambah user
Route::get('/user/create', [ManagementUserController::class, 'create']);

// Route untuk menyimpan data user
Route::post('/user', [ManagementUserController::class, 'store']);

// Route untuk menampilkan satu user berdasarkan id
Route::get('/user/{id}', [ManagementUserController::class, 'show']);

// Route untuk menampilkan form edit user
Route::get('/user/{id}/edit', [ManagementUserController::class, 'edit']);

// Route untuk update data user
Route::put('/user/{id}', [ManagementUserController::class, 'update']);

// Route untuk menghapus data user
Route::delete('/user/{id}', [ManagementUserController::class, 'destroy']);

Route::get("/home",function(){
    return view("home");
});

//hanya untuk laravel 8 kebawah
Route::group(['namespace'=>'Frontend'], function()
{
    Route::resource('home','HomeController');
});

//solusi 1
// Route::resource('home', HomeController::class);

// solusi 2
Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::resource('home', 'HomeController');
});

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::resource('dashboard', 'DashboardController');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
