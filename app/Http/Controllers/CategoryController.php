<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Category $category) {
        return Inertia::render('Category/Index', [
            $posts = $category->posts()->latest()->paginate(6),
              'posts' => $posts,
              'name' => $category->name
        ]);
    }
}
