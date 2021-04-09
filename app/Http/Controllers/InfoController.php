<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use App\Feature;
use App\Article;
use App\Category;

class InfoController extends Controller
{
    public function index()
    {
        $features = Feature::limit(4)->get();
        $posts = Post::latest()->limit(20)->get();
        $posts->load('category', 'user');

        $recommend1 = Article::where('feature_id', 1)->first();
        $recommend2 = Article::where('feature_id', 2)->first();
        $recommend3 = Article::where('feature_id', 3)->first();
        $recommend4 = Article::where('feature_id', 4)->first();
        $recommends = collect([$recommend1, $recommend2, $recommend3, $recommend4]);
        $categories = Category::all();
        $tags = Tag::all();
        $randoms = Article::inRandomOrder()->take(5)->get();

        return view('/info', [
            'posts' => $posts,
            'features' => $features,
            'recommends' => $recommends,
            'randoms' => $randoms,
            'categories' => $categories,
            'tags' => $tags

        ]);
    }
}
