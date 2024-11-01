<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        if (env('APP_ENV') === 'production') {
            \URL::forceScheme('https');
        }

        $settings = Setting::get();
        view()->composer(['site.*', 'auth.*'], fn($view) => $view->with('settings', $settings->mapWithKeys(fn($item) => [$item->key => $item->value])->all()));
    }
}
