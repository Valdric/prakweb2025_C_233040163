@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-3xl font-bold mb-6">Buat Post Baru</h1>

<form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded-lg shadow max-w-3xl">
    @csrf

    <div class="mb-4">
        <label class="block font-semibold">Judul</label>
        <input type="text" name="title" class="w-full mt-1 p-2 border rounded-lg" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Kategori</label>
        <select name="category_id" class="w-full mt-1 p-2 border rounded-lg" required>
            <option value="">--Pilih Kategori--</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Excerpt</label>
        <input type="text" name="excerpt" class="w-full mt-1 p-2 border rounded-lg">
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Isi Post</label>
        <textarea name="body" rows="6" class="w-full mt-1 p-2 border rounded-lg" required></textarea>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Gambar</label>
        <input type="file" name="image" class="mt-1">
    </div>

    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        Simpan
    </button>
</form>
@endsection
