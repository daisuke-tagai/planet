<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

use App\Article;
use App\Feature;
use App\Tag;
use App\Category;



class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->only(['create', 'store', 'edit', 'update', 'delete']);
        // 追加
        // $this->middleware('can:update,post')->only(['edit', 'update', 'delete']);
    }
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
        $features = Feature::all();

        return view('articles.create', [
            'features' => $features
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article;

        if ($request->file('image')) {
            $filename = $request->file('image')->store('public/image');
        } else {
            $filename = '';
        }

        $article->feature_id = $request->feature_id;
        $article->content = $request->content;
        $article->title = $request->title;
        $article->image = basename($filename);


        $article->save();

        return redirect('/feature');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->load('feature');

        $previous = Article::where('feature_id', '=', $article->feature_id)
                    ->where('id', '<', $article->id)
                    ->orderBy('id', 'desc')
                    ->first();

        $next = Article::where('feature_id', '=', $article->feature_id)
                ->where('id', '>', $article->id)
                ->orderBy('id')
                ->first();

        $recommends = Article::find([13, 16, 19, 22]);
        $randoms = Article::inRandomOrder()->take(5)->get();
        $tags = Tag::all();
        $categories = Category::all();


        return view('articles.show', [
            'article' => $article,
            'recommends' => $recommends,
            'randoms' => $randoms,
            'tags' => $tags,
            'categories' => $categories,
            'previous' => $previous,
            'next' => $next
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
        $article = Article::findOrFail($id);
        $features = Feature::all();

        return view('articles.edit', [
            'article' => $article,
            'features' => $features
        ]);
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
        $article = Article::findOrFail($id);

        if ($request->file('image')) {
            $filename = $request->file('image')->store('public/image');
        } else {
            $filename = '';
        }

        $article->feature_id = $request->feature_id;
        $article->content = $request->content;
        $article->title = $request->title;
        $article->image = basename($filename);

        $article->save();

        return redirect('/articles/' . $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/feature');
    }

    
}
