<?php

namespace App\Providers;

use App\Youtube\YoutubeServices;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Inertia::share('flash', function () {
            return [
                'success' => Session::get('success'),
            ];
        });

        Inertia::share([
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
        ]);
        // //I prend l'application danssa globalité
        $this->app->singleton(YoutubeServices::class, function () {
            return new YoutubeServices('AIzaSyA6jdX3j943cIc_-4NoQecePd25nPxOtKU');
        });
    }
}
