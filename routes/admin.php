<?php
// Modul Anggota 3: Admin
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{ProductController,OrderController as AdminOrderController};

Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function(){
    Route::get('/',[ProductController::class,'dashboard'])->name('dashboard');
    Route::resource('produk',ProductController::class)->except('show');
    Route::get('/pesanan',[AdminOrderController::class,'index'])->name('orders');
    Route::patch('/pesanan/{order}',[AdminOrderController::class,'status'])->name('orders.status');
});
