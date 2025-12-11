<x-layout>
    <div class="content-card">
        <h1 class="text-4xl font-bold text-red-400">{{ $post->title }}</h1>

        <p class="text-sm text-gray-400 mb-4">
            By <span class="text-red-300">{{ $post->user->name }}</span> in 
            <a href="{{ route('categories.show', $post->category) }}" class="text-red-300 hover:text-red-500">
                {{ $post->category->name }}
            </a>
        </p>

        <div class="text-gray-200 leading-relaxed">
            {!! nl2br(e($post->body)) !!}
        </div>
    </div>
</x-layout>
