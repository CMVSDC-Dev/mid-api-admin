<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::post('/list', [UserController::class, 'fetchAll'])->name('users.list');
    });

    Route::group(['prefix' => 'entries'], function () {
        Route::get('/', [EntryController::class, 'index'])->name('entries');
        Route::post('/list', [EntryController::class, 'fetchAll'])->name('entries.list');
    });

    // Settings routes
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/update-env', [SettingsController::class, 'updateEnv'])->name('update.env');
    });
});


require __DIR__.'/auth.php';
