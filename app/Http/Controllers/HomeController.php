<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Post;
use App\Tag;
use App\Feature;
use App\Article;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $features = Feature::limit(4)->get();
        $posts = Post::latest()->limit(20)->get();
        $posts->load('category', 'user');

        return view('home', [
            'posts' => $posts,
            'features' => $features,
        ]);
    }
}
