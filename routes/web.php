<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerPropertyController;
use App\Http\Controllers\PerformanceTestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name("home")->middleware(["tourist", 'proprietor']);

// Public Routes
Route::get('/properties', [PropertyController::class, 'index'])->name("properties.index")->middleware(["tourist", 'proprietor']);

// Authenticated Users
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    // Tourists
    Route::middleware("tourist")->prefix('favorites')->group(function () {
        Route::get('/', [FavoriteController::class, 'index'])->name("favorites.index");
        Route::post('/store', [FavoriteController::class, 'store'])->name("favorites.store");
    });

    // Property Management (General)
    Route::middleware("proprietor")->prefix('properties')->group(function () {
        Route::get('/create', [PropertyController::class, 'create'])->name("properties.create");
        Route::post('/store', [PropertyController::class, 'store'])->name("properties.store");
        Route::get('/edit/{property}', [PropertyController::class, 'edit'])->name("properties.edit");
        Route::put('/update/{property}', [PropertyController::class, 'update'])->name("properties.update");
    });

    // Owner-specific Routes
    Route::middleware('proprietor')->group(function () {
        Route::get('/my-properties', OwnerPropertyController::class)->name("my-properties.index");
    });

    Route::middleware("proprietor_or_admin")->delete('/destroy/{property}', [PropertyController::class, 'destroy'])->name("properties.destroy");

    // Admin-specific Routes
    Route::middleware("admin")->group(function () {
        Route::get('/dashboard', DashboardController::class)->name("dashboard");
        Route::get('/admin/properties', [PropertyController::class, 'index'])->name("properties.admin");
    });
});

Route::get('/loop-performance', [PerformanceTestController::class, 'loopPerformance']);
// Authentication Routes
require __DIR__.'/auth.php';
