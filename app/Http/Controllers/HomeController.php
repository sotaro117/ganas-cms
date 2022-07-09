<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\News;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index()
    {   $readPosts = Redis::zrevrange('trending_posts', 0, 4);
        $readPosts = Post::hydrate(
            array_map('json_decode', $readPosts)
        );
        $latestPost = Post::latest()->first();
        $previousPosts = Post::latest()->paginate(5)->slice(1);
        return Inertia::render('Home',[
            'latestPosts' => $latestPost,
            'previousPosts' => $previousPosts,
            'readPosts' => $readPosts,
            'events' => Event::latest()->paginate(5),
            'news' => News::latest()->paginate(6),
        ]);
    }
}
