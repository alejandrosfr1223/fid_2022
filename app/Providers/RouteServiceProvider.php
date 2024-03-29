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
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web', 'auth')
                ->name('admin.')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->name('formation.')
                ->prefix('formation')
                ->group(base_path('routes/formation.php'));

            Route::middleware('web')
                ->name('investigation.')
                ->prefix('investigation')
                ->group(base_path('routes/investigation.php'));

            Route::middleware('web')
                ->name('documentation.')
                ->prefix('documentation')
                ->group(base_path('routes/documentation.php'));

            Route::middleware('web')
                ->name('diffusion.')
                ->prefix('diffusion')
                ->group(base_path('routes/diffusion.php'));

            Route::middleware('web')
                ->name('divinapastora.')
                ->prefix('divinapastora')
                ->group(base_path('routes/divinapastora.php'));

            Route::middleware('web')
                ->name('contribute.')
                ->prefix('contribute')
                ->group(base_path('routes/contribute.php'));

            Route::middleware('web')
                ->name('services.')
                ->prefix('services')
                ->group(base_path('routes/services.php'));

            Route::middleware('web')
                ->name('purchase.')
                ->prefix('purchase')
                ->group(base_path('routes/purchase.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
