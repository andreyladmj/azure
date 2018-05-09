<?php

namespace Azure\Providers;

use Azure\GuestUser;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('hello', function(){
            return "<?= 'Hello world' ?>";
        });
        //php artisan view:clear

        view()->share('user', auth()->user() ?? new GuestUser());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
