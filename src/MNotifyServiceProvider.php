<?php

namespace Arhinful\LaravelMnotify;

use Arhinful\LaravelMnotify\NotificationDriver\MNotifyChannel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;

class MNotifyServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Notification::extend('mnotify', function ($app) {
            return new MnotifyChannel();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/mnotify.php' => config_path('mnotify.php'),
        ]);
    }

}
