<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // SOLUSI N+1 PROBLEM
        $posts = Post::with(['user', 'category'])->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load(['user', 'category']); // optional

        return view('posts.show', compact('post'));
    }
}
