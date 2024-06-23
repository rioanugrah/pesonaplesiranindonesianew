<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes([
    'verify' => true,
    // 'login' => false,
    'register' => false
]);

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    // Route::get('/', function(){
    //     return view('frontend.index');
    // })->name('frontend');
    Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend');
    Route::get('about-us', [App\Http\Controllers\FrontendController::class, 'about'])->name('frontend.about');
    Route::get('contact-us', [App\Http\Controllers\FrontendController::class, 'contact'])->name('frontend.contact');
    Route::post('contact-us/send-mail', [App\Http\Controllers\FrontendController::class, 'contact_send_mail'])->name('frontend.contact_send_mail');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });

    Route::post('mark-as-read', 'NotifikasiController@markNotification')->name('markNotification');
});
