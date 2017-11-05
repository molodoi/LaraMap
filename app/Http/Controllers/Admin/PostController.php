<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::published()->get();
        //$posts->load('category');
        $posts = Post::with('category')->with('tags')->paginate(8);
        /*$posts = Post::published()->with(['category' => function($query){
            //Affiner la requête des sous model sélectionnés
            $query->select('name');
        }])->get();*/
        return view('backend.posts.index', compact('posts'));
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
        return view('backend.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('backend.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $post = new Post();
        $post->title = $request->get('title');
        $post->slug = Str::slug($request->get('title').'-'.Carbon::now()->second);
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->published = 1;
        $post->save();
        $post->tags()->sync($request->tags_list);

        $posts = Post::published()->with('category')->with('tags')->paginate(8);
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

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
        return view('backend.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Post::destroy($id);
        /*$posts = Post::find($id);
        $posts->delete();*/
        return back()->with('success','Category removed successfully.');
    }
}
