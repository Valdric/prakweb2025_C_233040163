@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-3xl font-bold mb-6">Edit Post</h1>

<form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded-lg shadow max-w-3xl">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-semibold">Judul</label>
        <input type="text" name="title" value="{{ $post->title }}"
               class="w-full mt-1 p-2 border rounded-lg" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Kategori</label>
        <select name="category_id" class="w-full mt-1 p-2 border rounded-lg" required>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Excerpt</label>
        <input type="text" name="excerpt" value="{{ $post->excerpt }}"
               class="w-full mt-1 p-2 border rounded-lg">
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Isi Post</label>
        <textarea name="body" rows="6"
                  class="w-full mt-1 p-2 border rounded-lg" required>{{ $post->body }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Gambar</label><br>
        @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" class="w-40 mb-2 rounded-lg">
        @endif
        <input type="file" name="image">
    </div>

    <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
        Update
    </button>
</form>
@endsection
