<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
use App\Article;
use App\Category;
use App\Tag;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->only(['create', 'store', 'edit', 'update', 'delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $articles)
    {
        $features = Feature::all();

        return view('feature.index', [
            'features' => $features,
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'feature_name' => 'required|string|max:255',
        ]);
        
        $feature = new Feature;

        if ($request->file('image')) {
            $filename = $request->file('image')->store('public/image');
        } else {
            $filename = '';
        }

        $feature->id = $request->id;
        $feature->feature_name = $request->feature_name;
        $feature->image = basename($filename);

        $feature->save();

        return redirect('/admin/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        $feature = Feature::find($feature->id); 
        $articles = Article::where('feature_id', $feature->id) 
            ->get();

        return view('feature.show', [
            'feature' => $feature,
            'articles' => $articles,
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
        $feature = Feature::findOrFail($id);

        return view('feature.edit', [
            'feature' => $feature,
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
        $request->validate([
            'feature_name' => 'required|string|max:255',
        ]);
        
        $feature = Feature::findOrFail($id);

        if ($request->file('image')) {
            $filename = $request->file('image')->store('public/image');
        } else {
            $filename = '';
        }

        $feature->feature_name = $request->feature_name;
        $feature->image = basename($filename);

        $feature->save();

        return redirect('/admin/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
