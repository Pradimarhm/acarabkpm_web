<?php
//acara 5
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;

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

Route::get("/acara7", function(){
    return view("frontend/layout/home");
});
