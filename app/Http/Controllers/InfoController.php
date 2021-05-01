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

        return view('/info', [
            'posts' => $posts,
            'features' => $features,
        ]);
    }
}
