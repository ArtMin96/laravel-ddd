<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

//Route::prefix(prefix: 'oauth')->as(value: 'oauth:')->middleware(['web'])->group(static function (): void {
//    Route::prefix(prefix: 'github')->as(value: 'github:')->group(static function(): void {
//        Route::get(uri: 'login', action: \Domains\OAuth\Http\Controllers\LoginController::class)->name('login');
//        Route::get(uri: 'callback', action: \Domains\OAuth\Http\Controllers\CallbackController::class)->name('callback');
//    });
//});

Route::group(['prefix' => 'oauth', 'as' => 'oauth:', 'middleware' => 'web'], function () {
    Route::group(['prefix' => 'github', 'as' => 'github:'], function() {
        Route::get(uri: 'login', action: \Domains\OAuth\Http\Controllers\LoginController::class)->name('login');
        Route::get(uri: 'callback', action: \Domains\OAuth\Http\Controllers\CallbackController::class)->name('callback');
    });
});
