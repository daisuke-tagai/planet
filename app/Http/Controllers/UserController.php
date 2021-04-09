<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Tag;
use App\Article;
use App\Category;
use App\Feature;


use App\Http\Requests\PostRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $recommend1 = Article::where('feature_id', 1)->first();
        $recommend2 = Article::where('feature_id', 2)->first();
        $recommend3 = Article::where('feature_id', 3)->first();
        $recommend4 = Article::where('feature_id', 4)->first();
        $recommends = collect([$recommend1, $recommend2, $recommend3, $recommend4]);
        $randoms = Article::inRandomOrder()->take(5)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $features = Feature::all();


        $user = User::find($user->id);
        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
            'recommends' => $recommends,
            'randoms' => $randoms,
            'categories' => $categories,
            'tags' => $tags,
            'features' => $features,
        ]);
    }
        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/');
    }
}
