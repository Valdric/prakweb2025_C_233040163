@extends('dashboard.layouts.main')

@section('container')
<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>

        <a href="{{ route('dashboard.posts.index') }}"
           class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-900">
            ← Kembali
        </a>
    </div>

    {{-- Info Kategori --}}
    <div class="mb-4">
        <span class="text-sm font-semibold bg-blue-600 text-white px-3 py-1 rounded-full">
            {{ $post->category->name }}
        </span>
    </div>

    {{-- Gambar Post --}}
    @if($post->image)
        <div class="mb-6">
            <img src="{{ asset('storage/' . $post->image) }}"
                 class="rounded-xl shadow-md w-full">
        </div>
    @endif

    {{-- Excerpt --}}
    @if($post->excerpt)
        <div class="mb-6 text-gray-700">
            <p class="text-lg italic">{{ $post->excerpt }}</p>
        </div>
    @endif

    {{-- Body --}}
    <div class="prose max-w-none text-gray-800">
        {!! nl2br(e($post->body)) !!}
    </div>

    {{-- Tombol Edit dan Hapus --}}
    <div class="mt-10 flex gap-3">

        <a href="{{ route('dashboard.posts.edit', $post->id) }}"
           class="px-5 py-2 bg-yellow-400 text-gray-900 font-semibold rounded-lg hover:bg-yellow-500">
            ✏ Edit
        </a>

        <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="px-5 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700"
                    onclick="return confirm('Yakin mau hapus post ini?')">
                🗑 Delete
            </button>
        </form>

    </div>
</div>
@endsection
