<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\v1\RoleController;
use App\Http\Controllers\API\v1\UserController;
use App\Http\Controllers\API\v1\EntryController;
use App\Http\Controllers\API\v1\InquiryController;
use App\Http\Controllers\API\v1\RoleGroupController;
use App\Http\Controllers\API\v1\ImpairmentController;
use App\Http\Controllers\API\v1\PermissionController;
Route::middleware(['api'])->group( function () {
    // Authentication routes
    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('login', [AuthController::class, 'login'])->name('api.login');
        Route::middleware(['auth:api'])->group( function () {
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('refresh', [AuthController::class, 'refresh']);
            Route::post('me', [AuthController::class, 'me']);
        });
    });

    // Authenticated API routes
    Route::middleware([ 'auth:api'])->group( function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        // MID API Admin Settings routes
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/user-role/{id}', [UserController::class, 'UserRole']);
            Route::apiResources([
                'users' => UserController::class,
                'roles' => RoleController::class,
                'role-groups' => RoleGroupController::class,
                'permissions' => PermissionController::class,
            ]);
        });
    });

    // Custom Auth API routes using JWT token
    Route::middleware(['custom.auth'])->group( function () {
        // MID API resources routes
        Route::apiResources([
            'entries' => EntryController::class,
            'impairments' => ImpairmentController::class
        ]);

        // Route::get('searchBar', [UserController::class, 'searchBar'])->middleware('role:admin');

        Route::get('search', [InquiryController::class, 'search']);
    });

});
