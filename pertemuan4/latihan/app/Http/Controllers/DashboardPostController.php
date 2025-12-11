<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'category_id' => ['required','exists:categories,id'],
            'excerpt' => ['nullable','string'],
            'body' => ['required','string'],
            'image' => ['nullable','image','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);
        $data['user_id'] = Auth::id();

        Post::create($data);

        return redirect()->route('dashboard.posts.index')->with('success', 'Post berhasil dibuat.');
    }

    public function show(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('dashboard.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'category_id' => ['required','exists:categories,id'],
            'excerpt' => ['nullable','string'],
            'body' => ['required','string'],
            'image' => ['nullable','image','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);

        $post->update($data);

        return redirect()->route('dashboard.posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('success', 'Post berhasil dihapus.');
    }
}
