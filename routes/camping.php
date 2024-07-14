<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::domain('campingadventure.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('/', [App\Http\Controllers\Camping\FrontendController::class, 'index'])->name('camping.index');
});
