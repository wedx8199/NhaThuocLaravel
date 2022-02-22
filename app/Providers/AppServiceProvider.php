<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Country;

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
        //
        view()->composer('header',function($view){
            $category = ProductType::all();
            $view->with('category',$category);
        });

        view()->composer('main.header',function($view){
            $category = ProductType::all();
            $view->with('category',$category);
        });


        view()->composer('main.search',function($view){
            $country = Country::all();
            $view->with('country',$country);
        });
        view()->composer('main.sort',function($view){
            $country = Country::all();
            $view->with('country',$country);
        });
    }
}
