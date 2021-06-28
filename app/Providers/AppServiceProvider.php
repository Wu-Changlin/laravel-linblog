<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\WebConfig;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //分配前台通用的数据
        view()->composer('home/*', function($view){
            // 获取分类导航
            $category = Category::select('category_id', 'name','type','val')->where('is_pull','2')->get();
            // 获取网站配置（如网站标题，网站关键词，格言，底部栏）
            $web_config = WebConfig::select('config_id', 'name')->get();
            //统计文章数和文章访问数
            $article_count=Article::count('article_id');
            $article_visits=Article::sum('visits');

            $assign = [
                'category' => $category,
                'web_config'=>$web_config,
                'article_count'=>$article_count,
                'article_visits'=>$article_visits,

            ];
//            dd($assign);
            $view->with($assign);
            //dd($assign);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //允许应用程序在非生产环境中加载Laravel IDE Helper  laravel代码提示插件
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
