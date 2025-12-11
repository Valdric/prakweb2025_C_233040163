@extends('layouts.main')

@section('container')

<div class="max-w-5xl mx-auto mt-12">

    {{-- Title --}}
    <h1 class="text-4xl font-bold text-slate-900 mb-4">
        {{ $post->title }}
    </h1>

    {{-- Meta Info --}}
    <div class="flex items-center gap-6 mb-8 text-slate-600 text-lg">

        {{-- Kategori --}}
        <span>
            Kategori:
            <a href="/categories/{{ $post->category->slug }}"
               class="text-indigo-600 font-semibold hover:underline">
                {{ $post->category->name }}
            </a>
        </span>

        {{-- Author --}}
        <span>
            By:
            <a href="/posts?author={{ $post->user->username }}"
               class="text-indigo-600 font-semibold hover:underline">
                {{ $post->user->name }}
            </a>
        </span>
    </div>

    {{-- Featured Image --}}
    @if($post->image)
        <div class="mb-10">
            <img src="{{ asset('storage/' . $post->image) }}"
                 class="rounded-2xl shadow-lg w-full object-cover">
        </div>
    @endif

    {{-- Content --}}
    <div class="bg-white p-8 rounded-2xl shadow border border-slate-200">
        <article class="prose prose-slate max-w-none text-slate-800 leading-relaxed text-lg">
            {!! $post->body !!}
        </article>
    </div>

    {{-- Back Button --}}
    <div class="mt-10">
        <a href="/posts"
           class="inline-block px-5 py-3 bg-slate-800 text-white font-semibold rounded-xl
                  hover:bg-slate-900 shadow transition">
            ← Kembali
        </a>
    </div>

</div>

@endsection
