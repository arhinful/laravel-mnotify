<?php

namespace Arhinful\LaravelMnotify;

use Illuminate\Support\ServiceProvider;

class MNotifyServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        $this->publishes([
//            __DIR__.'/config/mnotify.php' => config_path('mnotify.php'),
//        ]);
    }

}
