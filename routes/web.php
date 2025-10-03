<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logoutadmin'])->name('admin.logout');
});

// Routes pour la connexion admin avec vérification par code
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/verification/form', [App\Http\Controllers\AdminController::class, 'showVerificationForm'])->name('admin.verification.form');
Route::post('/admin/verifycode', [App\Http\Controllers\AdminController::class, 'verifyCode'])->name('admin.verifycode');

//Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/admin/editprofile', [AdminController::class, 'editprofile'])->name('admin.editprofile');
    Route::put('/admin/updateprofile', [AdminController::class, 'updateprofile'])->name('admin.updateprofile');
    Route::patch('/admin/updatepassword', [AdminController::class, 'updatepassword'])->name('admin.updatepassword');
});

require __DIR__.'/auth.php';


