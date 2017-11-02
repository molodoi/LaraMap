<?php

namespace App\Http\Controllers;


use App\Http\Requests\EditPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::published()->get();
        //$posts->load('category');
        $posts = Post::published()->with('category')->get();
        /*$posts = Post::published()->with(['category' => function($query){
            //Affiner la requête des sous model sélectionnés
            $query->select('name');
        }])->get();*/
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        $post->tags()->sync($request->get('tags_list'));
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::findOrFail($post->id);

        $validator = \Validator::make($request->all(), [
            'title' => 'bail|required|max:255',
            'slug' => 'bail|required|max:255',
            'content' => 'bail|required|max:65000'
        ]);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $post->update($request->all());
        $post->tags()->sync($request->get('tags_list'));
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete ();
        $posts = Post::published()->with('category')->get();
        return view('posts.index', compact('posts'));
    }
}
