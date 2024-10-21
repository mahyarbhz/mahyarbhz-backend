<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicCategoryGroupController;
use App\Http\Controllers\PublicCategoryController;


Route::get('/ping', function () {
    return response()->json("Pong!");
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::group(['prefix' => 'categoryGroups'], function () {
    Route::get('', [PublicCategoryGroupController::class, 'index']);
    Route::get('{publicCategoryGroup}', [PublicCategoryGroupController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('', [PublicCategoryGroupController::class, 'store']);
        Route::put('{publicCategoryGroup}', [PublicCategoryGroupController::class, 'update']);
        Route::delete('{publicCategoryGroup}', [PublicCategoryGroupController::class, 'destroy']);
    });
});