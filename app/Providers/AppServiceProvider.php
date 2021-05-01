<?php

namespace App\Providers;

use App\Tag;
use App\Article;
use App\Category;

// use Doctrine\DBAL\Schema\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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
        if(Schema::hasTable('categories')){
            $categories = Category::all();
            view()->share('categories', $categories);
        }
        
        if(Schema::hasTable('articles')){
            $randoms = Article::inRandomOrder()->take(5)->get();
            view()->share('randoms', $randoms);
        }

        if(Schema::hasTable('articles')){
            $recommend1 = Article::where('feature_id', 1)->first();
            $recommend2 = Article::where('feature_id', 2)->first();
            $recommend3 = Article::where('feature_id', 3)->first();
            $recommend4 = Article::where('feature_id', 4)->first();
            $recommends = collect([$recommend1, $recommend2, $recommend3, $recommend4]);
            view()->share('recommends', $recommends);
        }

        if(Schema::hasTable('tags')){
            $tags = Tag::all();
            view()->share('tags', $tags);
        }
    }
}
