<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Tag;
use Artisan;
use Cache;
use Exception;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    protected const CACHE_EXPIRE = 86400; // One day in second

    /**
     * Bootstrap the application services.
     *
     * @throws Exception
     *
     * @return void
     */
    public function boot()
    {
        echo 1;
        echo 2;

        view()->composer(['layout/home', 'home'], function ($view) {

            // 分配数据
            echo 3;

            $view->with('name','王美丽');



            echo 4;
        });
        echo 5;
//        View::composer('layout/home',function($view){
//            echo 0000;
//            $view->with('name','王美丽');
//        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
