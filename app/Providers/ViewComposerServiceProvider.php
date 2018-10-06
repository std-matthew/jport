<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;
use App\Helpers;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {

            View::share('today', Carbon::now());
            View::share('helpers', new Helpers);

            /* Add in the needed vars if logged in */
            if(\Auth::check()) {

                $user = \Auth::user();

                View::share('self', $user);
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
