<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShortUrlController;

Route::get('/test', function () {
    return "API OK";
});


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Short URL APIs
    Route::get('/short-urls', [ShortUrlController::class, 'index']);
    Route::post('/short-urls', [ShortUrlController::class, 'store']);
    Route::get('/short-urls/{slug}/resolve', [ShortUrlController::class, 'resolve']);
});
