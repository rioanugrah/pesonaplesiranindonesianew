<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = 'b/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // $this->configureRateLimiting();

        // $this->routes(function () {
        //     Route::middleware('web')
        //         ->group(base_path('routes/web.php'));

        //     Route::prefix('api')
        //         ->middleware('api')
        //         ->group(base_path('routes/api.php'));
        // });
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapCampingRoutes();

        // $this->mapAppRoutes();
        // $this->mapSubRoutes();

        //
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapCampingRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/camping.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
        // RateLimiter::for('login-apps', function (Request $request) {
        //     return Limit::perMinute(3)->by(optional($request->user())->id ?: $request->ip())->response(function () {
        //         return response(['messsage' => 'You have reached your access limit (Posts). Please try after 1 minute.'], 429);
        //     });
        // });
        RateLimiter::for('login-apps', function(Request $request){
            $key = 'login-apps.'.$request->ip();
            $max = 3;
            $decay = 60;
            if (RateLimiter::tooManyAttempts($key,$max)) {
                return redirect()->back()->with('message','Too Many Request.');
            }else{
                RateLimiter::hit($key,$decay);
            }
        });
    }
}
