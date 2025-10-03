<?php

use App\Http\Controllers\Admin\AdherentController;
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


Route::middleware(['auth', 'verified'])->group(function () {
    // Admin Profile Routes
    Route::get('/admin/editprofile', [AdminController::class, 'editprofile'])->name('admin.editprofile');
    Route::put('/admin/updateprofile', [AdminController::class, 'updateprofile'])->name('admin.updateprofile');
    Route::patch('/admin/updatepassword', [AdminController::class, 'updatepassword'])->name('admin.updatepassword');

    // Famille Routes
    Route::get('/admin/familles', [AdherentController::class, 'familles'])->name('admin.familles');
    Route::get('/admin/famille/add', [AdherentController::class, 'familleAdd'])->name('admin.famille.add');
    Route::post('/admin/famille/save', [AdherentController::class, 'familleSave'])->name('admin.famille.save');
    Route::get('/admin/famille/edit/{id}', [AdherentController::class, 'familleEdit'])->name('admin.famille.edit');
    Route::put('/admin/famille/update/{id}', [AdherentController::class, 'familleUpdate'])->name('admin.famille.update');
    Route::get('/admin/famille/delete/{id}', [AdherentController::class, 'familleDelete'])->name('admin.famille.delete');

    // Adhérent Routes
    Route::get('/admin/adherents', [AdherentController::class, 'adherents'])->name('admin.adherents');
    Route::get('/admin/adherent/add', [AdherentController::class, 'adherentAdd'])->name('admin.adherent.add');
    Route::post('/admin/adherent/save', [AdherentController::class, 'adherentSave'])->name('admin.adherent.save');
    Route::get('/admin/adherent/edit/{id}', [AdherentController::class, 'adherentEdit'])->name('admin.adherent.edit');
    Route::put('/admin/adherent/update/{id}', [AdherentController::class, 'adherentUpdate'])->name('admin.adherent.update');
    Route::get('/admin/adherent/delete/{id}', [AdherentController::class, 'adherentDelete'])->name('admin.adherent.delete');
});

require __DIR__.'/auth.php';


