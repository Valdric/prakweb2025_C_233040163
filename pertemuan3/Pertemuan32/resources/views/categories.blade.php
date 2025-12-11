<x-layout>
    <h1 class="text-3xl font-bold mb-6 text-red-400">Categories</h1>

    @foreach ($categories as $cat)
        <div class="content-card">
            <a href="{{ route('categories.show', $cat) }}" class="text-red-300 hover:text-red-500 text-xl">
                {{ $cat->name }}
            </a>

            <p class="text-gray-400 text-sm mt-1">
                {{ $cat->posts_count }} posts
            </p>
        </div>
    @endforeach
</x-layout>
