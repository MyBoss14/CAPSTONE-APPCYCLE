<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\PusherSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
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

        // setting timezone
        $generalSetting = GeneralSetting::first();
        $pusherSetting = PusherSetting::first();

        Config::set('app.timezone', $generalSetting->time_zone);

        // broadcasting config
        Config::set('broadcasting.connections.pusher.key', $pusherSetting->pusher_key);
        Config::set('broadcasting.connections.pusher.secret', $pusherSetting->pusher_secret);
        Config::set('broadcasting.connections.pusher.app_id', $pusherSetting->pusher_app_id);
        Config::set('broadcasting.connections.pusher.options.host', "api-".$pusherSetting->pusher_cluster.".pusher.com");





        // share this variable in all views
        View::composer('*', function($view) use ($generalSetting, $pusherSetting){
            $view->with(['settings'=> $generalSetting, 'pusherSetting' => $pusherSetting]);
        });


    }
}
