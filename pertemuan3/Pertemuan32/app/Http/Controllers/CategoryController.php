<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // tampilkan semua kategori
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('categories', compact('categories'));
    }

    // tampilkan post berdasarkan kategori
    public function show(Category $category)
    {
        $posts = $category->posts()->with('user')->latest()->paginate(10);
        return view('posts', [
            'posts' => $posts,
            'category' => $category,
        ]);
    }
}
