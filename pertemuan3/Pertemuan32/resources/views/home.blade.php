<x-layout>
    <div class="content-card">
        <h1 class="text-4xl font-bold mb-4 text-red-400">
            Selamat datang di Laravel Practice
        </h1>

        <p class="text-lg">
            Buka 
            <a href="{{ route('posts.index') }}" class="text-red-300 hover:text-red-500">Blog</a> 
            atau 
            <a href="{{ route('categories.index') }}" class="text-red-300 hover:text-red-500">Categories</a>.
        </p>
    </div>
</x-layout>
