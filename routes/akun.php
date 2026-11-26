<?php
// Modul Anggota 1: Akun & Katalog
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,AuthController};

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/produk/{product}',[HomeController::class,'show'])->name('products.show');
Route::get('/kategori/{category}',[HomeController::class,'category'])->name('categories.show');
Route::get('/daftar',[AuthController::class,'registerForm'])->name('register');
Route::post('/daftar',[AuthController::class,'register'])->name('register.store');
Route::get('/masuk',[AuthController::class,'loginForm'])->name('login');
Route::post('/masuk',[AuthController::class,'login'])->name('login.store');
Route::post('/keluar',[AuthController::class,'logout'])->middleware('auth')->name('logout');
