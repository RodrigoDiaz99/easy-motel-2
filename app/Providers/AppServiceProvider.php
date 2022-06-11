<?php

namespace App\Providers;

use App\Models\Establishment;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.navbars.sidebar', function ($view) {

            $hotels = Establishment::where('establishment_types_id', '1')->orderBy('id', 'ASC')->get();
            $motels = Establishment::where('establishment_types_id', '2')->orderBy('id', 'ASC')->get();
            return $view->with('hotels', $hotels)->with('motels', $motels);;
        });
    }
}
