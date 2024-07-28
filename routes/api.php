<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::prefix('v1')->group(function(){
        Route::prefix('bromo')->group(function(){
            Route::get('/', [App\Http\Controllers\v1\BromoController::class, 'api_index'])->name('api.bromo');
        });
    });
    // Route::post('open_payment', [App\Http\Controllers\Payment\TripayController::class, 'handle_open_payment']);
    Route::post('callback', [App\Http\Controllers\Payment\TripayController::class, 'handle']);
});
