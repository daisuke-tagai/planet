<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Post;
use App\Tag;
use App\Feature;
use App\Article;
use App\Category;



class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $q = \Request::query();

        $features = Feature::all();

        if(isset($q['category_id'])) {
            $posts = Post::latest()->where('category_id', $q['category_id'])->paginate(20);
            $posts->load('category', 'user', 'tags');

            $category_name = Category::find($q['category_id']);
            
            return view('posts.index', [
                'posts' => $posts,
                'category_id' => $q['category_id'],
                'features' => $features,
                'category_name' => $category_name,
                ]);
                
        } if(isset($q['tag_name'])) {
            $posts = Post::latest()->where('content', 'like', "%{$q['tag_name']}%")->paginate(20);
            $posts->load('category', 'user', 'tags');

            $tag_name = $q['tag_name'];

            return view('posts.index', [
                'posts' => $posts,
                'tag_name' => $q['tag_name'],
                'features' => $features,
                'tag_name' => $tag_name
            ]);
        } else {
            $posts = Post::latest()->paginate(20);
            $posts->load('category', 'user');
            
            return view('posts.index', [
                'posts' => $posts,
                'features' => $features,
                ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;

        if($request->file('image'))
        {
            $filename = $request->file('image')->store('public/image');

        } else {
            $filename = '';
        }

        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->title = $request->title;
        $post->image = basename($filename);

        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->content, $match);

        $tags = [];
        foreach ($match[1] as $tag) {
            $found = Tag::firstOrCreate(['tag_name' => $tag]);

            array_push($tags, $found);
        }
        
        $tag_ids = [];
        foreach ($tags as $tag) {
            array_push($tag_ids, $tag['id']);
        }
        // dd($post);
        $post->save();
        $post->tags()->attach($tag_ids);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('category', 'user', 'comments.user');
        $features = Feature::all();

        return view('posts.show', [
            'post' => $post,
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
        $post = Post::findOrFail($id);

        return view('posts.edit', [
            'post' => $post,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        // $id = $request->post_id;
        $post = Post::findOrFail($id);

        if ($request->file('image')) {
            $filename = $request->file('image')->store('public/image');
        } else {
            $filename = '';
        }

        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->title = $request->title;
        $post->image = basename($filename);

        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->content, $match);

        $tags = [];
        foreach ($match[1] as $tag) {
            $found = Tag::firstOrCreate(['tag_name' => $tag]);

            array_push($tags, $found);
        }

        $tag_ids = [];
        foreach ($tags as $tag) {
            array_push($tag_ids, $tag['id']);
        }
        // dd($post);
        $post->save();
        $post->tags()->attach($tag_ids);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $posts = Post::latest()->where('title', 'like', "%{$request->search}%")
                ->orWhere('content', 'like', "%{$request->search}%")
                ->paginate(20);

        $search_result = $request->search.'の検索結果'.$posts->total().'件';

        $features = Feature::all();

        return view('posts.index', [
            'posts' => $posts,
            'search_result' => $search_result,
            'search_query' => $request->search,
            'features' => $features,
        ]);
    }
}
