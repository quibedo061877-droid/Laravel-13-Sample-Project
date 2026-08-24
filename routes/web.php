<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return redirect()->route('login');
});

//Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('users.dashboard');
})->middleware(['auth', 'verified'])->name('users.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('AuthAdmin::class')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/departments', [AdminController::class, 'departments'])->name('admin.departments');
    Route::get('/admin/department/create', [AdminController::class, 'createDepartment'])->name('admin.departments.create');
    Route::post('/admin/department', [AdminController::class, 'storeDepartment'])->name('admin.departments.store');
    Route::get('/admin/department/{id}/edit', [AdminController::class, 'editDepartment'])->name('admin.departments.edit');
    Route::put('/admin/department/{id}', [AdminController::class, 'updateDepartment'])->name('admin.departments.update');
    Route::delete('/admin/department/{id}', [AdminController::class, 'destroyDepartment'])->name('admin.departments.destroy');
});

require __DIR__.'/auth.php';
