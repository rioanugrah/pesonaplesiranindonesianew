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
    'register' => true
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
        Route::get('checkout/bromo/{id}', [App\Http\Controllers\FrontendController::class, 'bromo_checkout'])->name('frontend.bromo_checkout');
        Route::post('checkout/bromo/{id}/buy', [App\Http\Controllers\FrontendController::class, 'bromo_payment'])->name('frontend.bromo_payment');

        // Route::get('open_payment', [App\Http\Controllers\Payment\TripayController::class, 'handle_open_payment']);

        Route::prefix('b')->group(function(){
            Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
            Route::prefix('bromo')->group(function(){
                Route::get('/', [App\Http\Controllers\v1\BromoController::class, 'b_index'])->middleware('verified')->name('bromo.b_index');
                Route::post('simpan', [App\Http\Controllers\v1\BromoController::class, 'b_simpan'])->middleware('verified')->name('bromo.b_b_simpan');
                Route::post('reupload/simpan', [App\Http\Controllers\v1\BromoController::class, 'b_reupload_simpan'])->middleware('verified')->name('bromo.reupload_simpan');
            });
            Route::prefix('emails')->group(function(){
                Route::prefix('template')->group(function(){
                    Route::get('/', [App\Http\Controllers\EmailMarketingController::class, 'b_template_index'])->middleware('verified')->name('emails.b_template');
                    Route::get('create', [App\Http\Controllers\EmailMarketingController::class, 'b_template_create'])->middleware('verified')->name('emails.b_template.create');
                    Route::post('simpan', [App\Http\Controllers\EmailMarketingController::class, 'b_template_simpan'])->middleware('verified')->name('emails.b_template.simpan');
                    Route::get('{id}', [App\Http\Controllers\EmailMarketingController::class, 'b_template_detail'])->middleware('verified')->name('emails.b_template.detail');
                    Route::get('{id}/edit', [App\Http\Controllers\EmailMarketingController::class, 'b_template_edit'])->middleware('verified')->name('emails.b_template.edit');
                    Route::post('{id}/update', [App\Http\Controllers\EmailMarketingController::class, 'b_template_update'])->middleware('verified')->name('emails.b_template.update');
                });
                Route::get('/', [App\Http\Controllers\EmailMarketingController::class, 'b_email_index'])->middleware('verified')->name('emails.b_email');
                Route::get('create', [App\Http\Controllers\EmailMarketingController::class, 'b_email_create'])->middleware('verified')->name('emails.b_email.create');
                Route::post('simpan', [App\Http\Controllers\EmailMarketingController::class, 'b_email_simpan'])->middleware('verified')->name('emails.b_email.simpan');
            });
            Route::prefix('transaction')->group(function(){
                Route::get('/', [App\Http\Controllers\v1\TransactionController::class, 'index'])->name('b.transaction')->middleware('verified');
                Route::get('{id}', [App\Http\Controllers\v1\TransactionController::class, 'detail'])->name('b.transaction.detail')->middleware('verified');
                Route::get('{id}/invoice', [App\Http\Controllers\v1\TransactionController::class, 'invoice'])->name('b.transaction.invoice')->middleware('verified');
                // Route::get('bukti_pembayaran/{kode_transaksi}', [App\Http\Controllers\v1\TransactionController::class, 'detail_bukti_pembayaran'])->name('b.transaction.detail_bukti_pembayaran')->middleware('verified');
                // Route::post('bukti_pembayaran/simpan', [App\Http\Controllers\v1\TransactionController::class, 'bukti_pembayaran_simpan'])->name('b.transaction.bukti_pembayaran.simpan')->middleware('verified');
            });
            Route::prefix('permissions')->group(function(){
                Route::get('/', [App\Http\Controllers\v1\PermissionsController::class, 'index'])->name('permissions')->middleware('verified');
                Route::post('simpan', [App\Http\Controllers\v1\PermissionsController::class, 'simpan'])->name('permissions.simpan')->middleware('verified');
            });

            Route::prefix('camping')->group(function(){
                Route::prefix('category')->group(function(){
                    Route::get('/', [App\Http\Controllers\CampingController::class, 'camping_category_index'])->name('b.camping_category_index')->middleware('verified');
                    Route::post('simpan', [App\Http\Controllers\CampingController::class, 'camping_categori_simpan'])->name('b.camping_categori_simpan')->middleware('verified');
                });
            });

            Route::resource('users', App\Http\Controllers\v1\UsersController::class)->middleware('verified');
            Route::resource('roles', App\Http\Controllers\v1\RolesController::class)->middleware('verified');
        });
    });

    // Route::get('test_email', [App\Http\Controllers\TestController::class, 'testEmail']);

    Route::get('redirect/{driver}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login_google');
    Route::get('{driver}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('login.callback');
    Route::post('mark-as-read', [App\Http\Controllers\NotifikasiController::class, 'markNotification'])->name('markNotification');
});
