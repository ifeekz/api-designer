<?php

use Illuminate\Support\Facades\Route;
use App\Modules\AuthModule\Controllers\OAuthController;
use App\Modules\AuthModule\Controllers\ApiKeyController;

Route::prefix('auth')->group(function () {
    // OAuth protected
    Route::middleware('auth:api')->get('/user/oauth', [OAuthController::class, 'user']);

    // API key protected
    Route::middleware('auth.apikey')->get('/user/key', [OAuthController::class, 'user']);

    // For testing: generate new key (user must be logged in)
    Route::middleware('auth:api')->post('/key/generate', [ApiKeyController::class, 'generate']);
    Route::middleware('auth:api')->get('/key/list', [ApiKeyController::class, 'list']);
});
