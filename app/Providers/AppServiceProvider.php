<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(UrlGenerator $url)
    {
        // if(env('REDIRECT_HTTPS')) {
        //     $url->formatScheme('https');
        // }
        Schema::defaultStringLength(191);
        Carbon::setLocale(config('app.locale'));
    }
  

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
