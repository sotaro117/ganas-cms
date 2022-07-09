<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as httpRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return Inertia::render('Posts/Index', [
        // 'posts' => Post::latest()->paginate(15),
        'filters' => Request::all('search', 'categories', 'user'),
            'posts' => Post::latest()->filter(
                Request::only('search', 'categories', 'user')
            )->paginate(10)->withQueryString(),
        'trashedPosts' => Post::withTrashed()->get(),
        'users' => User::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return Inertia::render('Posts/Create', [
            'categories' => Category::get(),
            'users' => User::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, httpRequest $httpRequest)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required','file', 'image', 'mimes:jpg,jpeg,png'],
            'excerpt' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'user_id' => 'required'
        ]); 
        request('thumbnail')->store('public/thumbnails');
        $uploadedFile = request()->file('thumbnail'); 

        $attributes['thumbnail'] = $uploadedFile->hashName();
        
        $post = Post::create($attributes);
        foreach(request()->input('categories_id') as $category_id){
            $post->categories()->attach($category_id);
        }

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post, 
            'categories' => Category::get(),
            'users' => User::get()->map->only('id','name')
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            // 'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'user_id' => 'required'
        ]);
        // request('thumbnail')->store('public/thumbnails');
        // $uploadedFile = request()->file('thumbnail'); 

        // $attributes['thumbnail'] = $uploadedFile->hashName();

        $post->categories()->detach();
        foreach(request()->input('categories_id') as $category_id){
            $post->categories()->attach($category_id) ;
        }
        
        $post->update($attributes);

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/admin/posts');
    }

    public function restore(Post $post) {
        $post->restore();
        
    }

    public function upload(httpRequest $httpRequest){
        $fileName=$httpRequest->file('file')->getClientOriginalName();
        $path=$httpRequest->file('file')->storeAs('upload', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]); 
    }

    
}
