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

        $categories = Category::all();
        $tags = Tag::all();


        $recommends = Article::find([13, 16, 19, 22]);
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
