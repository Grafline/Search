<?php
/**
 * Created by PhpStorm.
 * User: kuzma
 * Date: 09.05.19
 * Time: 19:27
 */

namespace Grafline\Search;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class SearchServiceProvider extends ServiceProvider
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
        $this->app->singleton('search', function (){
            return new Search();
        });
    }
}