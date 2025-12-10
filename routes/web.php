<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/auth/firebase', [AuthController::class, 'firebaseAuth'])->name('auth.firebase');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('admin.profile.update');

    // Category Resource
    Route::resource('/admin/kategori', App\Http\Controllers\KategoriTransaksiController::class, [
        'as' => 'admin'
    ])->parameters(['kategori' => 'id']);

    // Transaction Resource
    Route::resource('/admin/transaksi', App\Http\Controllers\TransaksiController::class, [
        'as' => 'admin'
    ])->parameters(['transaksi' => 'id']);

    // User Resource
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.destroy');
    });
});
