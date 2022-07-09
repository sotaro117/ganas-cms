<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return Inertia::render('Posts/Index', [
            'filters' => Request::all('search', 'categories'),
            'posts' => Post::latest()->filter(
                Request::only('search', 'categories')
            )->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        Redis::zincrby('trending_posts', 1, $post);
        Redis::zremrangebyrank('tranding_posts', 0, -11);

        $readPosts = Redis::zrevrange('trending_posts', 0, 4);
        $readPosts = Post::hydrate(
            array_map('json_decode', $readPosts)
        );

        $related = Post::inRandomOrder()->take(6)->get(['id', 'title', 'slug', 'thumbnail', 'created_at']);
        $latest = Post::take(10)->latest()->get(['id', 'title', 'slug', 'thumbnail', 'created_at']);
        
        
        return Inertia::render('Posts/Show', [
            'post' => $post,
            'related' => $related,
            'latest' => $latest,
            'readPosts' => $readPosts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    
}
