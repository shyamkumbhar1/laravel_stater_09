<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('custom-service', function () {
            return new \App\Services\CustomService();
        });
    }

  
    public function boot()
    {
        //
    }
}
