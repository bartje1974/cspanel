<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Config::set('app.name', setting('app_name'));
        Config::set('app.url', setting('domain_url'));
        Config::set('mail.from.address', setting('email'));
        Config::set('mail.from.name', setting('from_email_name'));
    }
}
