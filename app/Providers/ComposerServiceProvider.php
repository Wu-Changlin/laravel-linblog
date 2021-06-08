<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
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
