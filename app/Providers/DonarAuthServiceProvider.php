<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DonarAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Auth::extend('donar', function($app){
            // you can use Config::get() to retrieve the model class name from config file
            $myProvider = new EloquentUserProvider($app['hash'], '\App\Donar') 
            return new Guard($myProvider, $app['session.store']);
        })
        $app->singleton('auth.driver_donar', function($app){
            return Auth::driver('donar');
        });
    }
}
