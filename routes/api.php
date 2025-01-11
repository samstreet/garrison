<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->name('v1.')
    ->namespace('App\Http\Controllers\V1')
    ->middleware([
        'api',
    ])
    ->group(function (): void {
        Route::middleware('auth:api')->group(function (): void {
            require __DIR__.'/api/v1/users.v1.php';
            require __DIR__.'/api/v1/games.v1.php';
        });
    });
