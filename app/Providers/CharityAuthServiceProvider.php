<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CharityAuthServiceProvider extends ServiceProvider
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
        Auth::extend('charity', function($app){
            // you can use Config::get() to retrieve the model class name from config file
            $myProvider = new EloquentUserProvider($app['hash'], '\App\Charity') 
            return new Guard($myProvider, $app['session.store']);
        })
        $app->singleton('auth.driver_charity', function($app){
            return Auth::driver('charity');
        });
    }
}
