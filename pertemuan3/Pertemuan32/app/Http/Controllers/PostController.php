<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // tampilkan semua post (dengan relasi user & category)
    public function index()
    {
        $posts = Post::with(['user', 'category'])->latest()->paginate(10);
        return view('posts', compact('posts'));
    }

    // tampilkan detail post
    public function show(Post $post)
    {
        return view('post_show', compact('post'));
    }
}
