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

    Route::prefix('bromo')->group(function(){
        Route::get('/', [App\Http\Controllers\FrontendController::class, 'bromo'])->name('frontend.bromo');
        Route::get('{id}', [App\Http\Controllers\FrontendController::class, 'bromo_list'])->name('frontend.bromo_list');
    });

    Route::get('about-us', [App\Http\Controllers\FrontendController::class, 'about'])->name('frontend.about');

    Route::prefix('contact-us')->group(function(){
        Route::get('/', [App\Http\Controllers\FrontendController::class, 'contact'])->name('frontend.contact');
        Route::post('send-mail', [App\Http\Controllers\FrontendController::class, 'contact_send_mail'])->name('frontend.contact_send_mail');
    });

    Route::get('kebijakan_privasi', [App\Http\Controllers\FrontendController::class, 'kebijakan_privasi'])->name('frontend.kebijakan_privasi');

    Route::get('sitemap', [App\Http\Controllers\SitemapController::class, 'index']);

    Route::group(['middleware' => 'auth'], function () {
        Route::get('bromo/{id}/{id_list}/checkout', [App\Http\Controllers\FrontendController::class, 'bromo_checkout'])->name('frontend.bromo_checkout');
        Route::post('bromo/{id}/{id_list}/checkout/buy', [App\Http\Controllers\FrontendController::class, 'bromo_payment'])->name('frontend.bromo_payment');

        // Route::get('open_payment', [App\Http\Controllers\Payment\TripayController::class, 'handle_open_payment']);

        Route::prefix('b')->group(function(){
            Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
            Route::prefix('bromo')->group(function(){
                Route::get('/', [App\Http\Controllers\v1\BromoController::class, 'b_index'])->middleware('verified')->name('bromo.b_index');
                Route::get('create', [App\Http\Controllers\v1\BromoController::class, 'b_create'])->middleware('verified')->name('bromo.b_create');
                Route::post('simpan', [App\Http\Controllers\v1\BromoController::class, 'b_simpan'])->middleware('verified')->name('bromo.b_b_simpan');
                Route::get('{id}', [App\Http\Controllers\v1\BromoController::class, 'b_bromo_detail'])->middleware('verified')->name('bromo.b_bromo_detail');
                Route::get('{id}/edit', [App\Http\Controllers\v1\BromoController::class, 'b_bromo_edit'])->middleware('verified')->name('bromo.b_bromo_edit');
                Route::post('{id}/edit/update', [App\Http\Controllers\v1\BromoController::class, 'b_bromo_update'])->middleware('verified')->name('bromo.b_bromo_update');
                Route::get('{id}/list', [App\Http\Controllers\v1\BromoController::class, 'b_bromo_list'])->middleware('verified')->name('bromo.b_bromo_list');
                Route::post('{id}/list/simpan', [App\Http\Controllers\v1\BromoController::class, 'b_bromo_list_simpan'])->middleware('verified')->name('bromo.b_bromo_list_simpan');
                Route::get('{id}/list/{id_bromo}/edit', [App\Http\Controllers\v1\BromoController::class, 'b_bromo_list_edit'])->middleware('verified')->name('bromo.b_bromo_list_edit');
                Route::post('{id}/list/{id_bromo}/update', [App\Http\Controllers\v1\BromoController::class, 'b_bromo_list_update'])->middleware('verified')->name('bromo.b_bromo_list_update');
                Route::get('{id}/list/{id_bromo}/delete', [App\Http\Controllers\v1\BromoController::class, 'b_bromo_list_delete'])->middleware('verified')->name('bromo.b_bromo_list_delete');
                // Route::post('reupload/simpan', [App\Http\Controllers\v1\BromoController::class, 'b_reupload_simpan'])->middleware('verified')->name('bromo.reupload_simpan');
                // Route::post('upload_file', [App\Http\Controllers\v1\BromoController::class, 'b_upload_image'])->middleware('verified')->name('bromo.b_upload_image');
                // Route::get('get_all_file', function(){
                //     $files = \File::allFiles(public_path('backend/images/bromo/'));
                //     return $files;
                // });
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

            Route::prefix('slider')->group(function(){
                Route::get('/', [App\Http\Controllers\SliderController::class, 'index'])->middleware('verified')->name('slider');
                Route::get('create', [App\Http\Controllers\SliderController::class, 'create'])->middleware('verified')->name('slider.create');
                Route::post('simpan', [App\Http\Controllers\SliderController::class, 'simpan'])->middleware('verified')->name('slider.simpan');
            });

            Route::prefix('camping')->group(function(){
                Route::prefix('category')->group(function(){
                    Route::get('/', [App\Http\Controllers\CampingController::class, 'camping_category_index'])->name('b.camping_category_index')->middleware('verified');
                    Route::post('simpan', [App\Http\Controllers\CampingController::class, 'camping_categori_simpan'])->name('b.camping_categori_simpan')->middleware('verified');
                    Route::post('update', [App\Http\Controllers\CampingController::class, 'camping_categori_update'])->name('b.camping_categori_update')->middleware('verified');
                    Route::get('{id}', [App\Http\Controllers\CampingController::class, 'camping_category_show'])->name('b.camping_category_show')->middleware('verified');
                    Route::delete('{id}/delete', [App\Http\Controllers\CampingController::class, 'camping_category_delete'])->name('b.camping_category_delete')->middleware('verified');
                });
                Route::prefix('pricelist')->group(function(){
                    Route::get('/', [App\Http\Controllers\CampingController::class, 'camping_pricelist_index'])->name('b.camping_pricelist_index')->middleware('verified');
                    Route::get('create', [App\Http\Controllers\CampingController::class, 'camping_pricelist_create'])->name('b.camping_pricelist_create')->middleware('verified');
                    Route::post('simpan', [App\Http\Controllers\CampingController::class, 'camping_pricelist_simpan'])->name('b.camping_pricelist_simpan')->middleware('verified');
                    Route::get('{id}', [App\Http\Controllers\CampingController::class, 'camping_pricelist_edit'])->name('b.camping_pricelist_edit')->middleware('verified');
                    Route::post('{id}/update', [App\Http\Controllers\CampingController::class, 'camping_pricelist_update'])->name('b.camping_pricelist_update')->middleware('verified');
                    Route::delete('{id}/delete', [App\Http\Controllers\CampingController::class, 'camping_pricelist_delete'])->name('b.camping_pricelist_delete')->middleware('verified');
                });
                Route::prefix('reservation')->group(function(){
                    Route::get('/', [App\Http\Controllers\CampingController::class, 'camping_reservation_index'])->name('b.camping_reservation_index')->middleware('verified');
                    Route::get('create', [App\Http\Controllers\CampingController::class, 'camping_reservation_create'])->name('b.camping_reservation_create')->middleware('verified');
                    Route::post('simpan', [App\Http\Controllers\CampingController::class, 'camping_reservation_simpan'])->name('b.camping_reservation_simpan')->middleware('verified');
                    Route::get('{id}/return', [App\Http\Controllers\CampingController::class, 'camping_reservation_return'])->name('b.camping_reservation_return')->middleware('verified');
                    Route::post('{id}/simpan', [App\Http\Controllers\CampingController::class, 'camping_reservation_return_simpan'])->name('b.camping_reservation_return_simpan')->middleware('verified');
                });
                Route::prefix('orders')->group(function(){
                    Route::get('/', [App\Http\Controllers\CampingController::class, 'camping_orders_index'])->name('b.camping_orders_index')->middleware('verified');
                    Route::get('{id}', [App\Http\Controllers\CampingController::class, 'camping_orders_detail'])->name('b.camping_orders_detail')->middleware('verified');
                });
            });

            Route::prefix('cooperation')->group(function(){
                Route::get('/', [App\Http\Controllers\v1\CooperationController::class, 'cooperation'])->name('b.cooperation')->middleware('verified');
                Route::get('create', [App\Http\Controllers\v1\CooperationController::class, 'cooperation_create'])->name('b.cooperation_create')->middleware('verified');
                Route::post('simpan', [App\Http\Controllers\v1\CooperationController::class, 'cooperation_simpan'])->name('b.cooperation_simpan')->middleware('verified');
                Route::get('{id}', [App\Http\Controllers\v1\CooperationController::class, 'cooperation_detail'])->name('b.cooperation_detail')->middleware('verified');
                Route::get('{id}/validasi', [App\Http\Controllers\v1\CooperationController::class, 'cooperation_validasi'])->name('b.cooperation_validasi')->middleware('verified');
                Route::post('{id}/validasi/simpan', [App\Http\Controllers\v1\CooperationController::class, 'cooperation_validasi_simpan'])->name('b.cooperation_validasi_simpan')->middleware('verified');
            });
            Route::prefix('kategori/cooperation')->group(function(){
                Route::get('/', [App\Http\Controllers\v1\CooperationController::class, 'kategori_corporate_index'])->name('b.kategori_corporate.index')->middleware('verified');
                Route::get('create', [App\Http\Controllers\v1\CooperationController::class, 'kategori_corporate_create'])->name('b.kategori_corporate.create')->middleware('verified');
                Route::post('simpan', [App\Http\Controllers\v1\CooperationController::class, 'kategori_corporate_simpan'])->name('b.kategori_corporate.simpan')->middleware('verified');
                Route::get('{id}', [App\Http\Controllers\v1\CooperationController::class, 'kategori_corporate_detail'])->name('b.kategori_corporate.detail')->middleware('verified');
                Route::get('{id}/edit', [App\Http\Controllers\v1\CooperationController::class, 'kategori_corporate_edit'])->name('b.kategori_corporate.edit')->middleware('verified');
                Route::post('{id}/update', [App\Http\Controllers\v1\CooperationController::class, 'kategori_corporate_update'])->name('b.kategori_corporate.update')->middleware('verified');
            });

            Route::resource('users', App\Http\Controllers\v1\UsersController::class)->middleware('verified');
            Route::resource('roles', App\Http\Controllers\v1\RolesController::class)->middleware('verified');
        });
    });

    // Route::get('test_email', [App\Http\Controllers\TestController::class, 'testEmail']);
    Route::prefix('kab_kota')->group(function(){
        Route::post('/', [App\Http\Controllers\LocationController::class, 'KabupatenKota'])->name('kota');
    });

    Route::prefix('kecamatan')->group(function(){
        Route::post('/', [App\Http\Controllers\LocationController::class, 'Kecamatan'])->name('kecamatan');
    });

    Route::get('redirect/{driver}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login_google');
    Route::get('{driver}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('login.callback');
    Route::post('mark-as-read', [App\Http\Controllers\NotifikasiController::class, 'markNotification'])->name('markNotification');
});
