<?php

use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return "Pong!";
});

Route::prefix('api')->group(function () {
    Route::get('/', function () {
        return "Hello World!";
    });
});