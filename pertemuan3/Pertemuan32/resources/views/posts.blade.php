<x-layout>
    <h1 class="text-3xl font-bold mb-6 text-red-400">
        {{ isset($category) ? 'Posts in: ' . $category->name : 'All Posts' }}
    </h1>

    @forelse ($posts as $post)
        <div class="content-card">
            <h2 class="text-2xl font-semibold text-white mb-1">
                <a href="{{ route('posts.show', $post) }}" class="hover:text-red-400">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="text-sm text-gray-400 mb-3">
                By <span class="text-red-300">{{ $post->user->name }}</span> — 
                {{ $post->created_at->diffForHumans() }}
            </p>

            <p class="text-gray-300">
                {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 150) }}
            </p>
        </div>
    @empty
        <p class="text-gray-400">Tidak ada post.</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>
