<?php

namespace App\Providers;

use App\Repo\SiteRepo;
use Illuminate\Support\ServiceProvider;

class SiteServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('SiteRepo', function($app) {
         
            return new SiteRepo();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
