<x-layout>

    {{-- TITLE --}}
    <h1 class="text-4xl font-bold mb-10 text-slate-900">Daftar Posts</h1>

    {{-- LIST POSTS --}}
    <div class="grid gap-6">
        @foreach($posts as $post)
            <article
                class="bg-white p-6 rounded-2xl shadow border border-slate-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-200">

                {{-- TITLE --}}
                <h3 class="text-2xl font-bold text-slate-900 mb-2">
                    <a href="{{ route('posts.show', $post) }}"
                       class="hover:text-indigo-700 transition">
                        {{ $post->title }}
                    </a>
                </h3>

                {{-- META --}}
                <p class="text-sm text-slate-500 mb-3">
                    Oleh
                    <span class="font-semibold text-slate-700">
                        {{ $post->user->name }}
                    </span>
                    dalam
                    <a href="/categories/{{ $post->category->slug }}"
                       class="text-indigo-600 hover:underline">
                        {{ $post->category->name }}
                    </a>
                    · {{ $post->created_at->diffForHumans() }}
                </p>

                {{-- EXCERPT --}}
                <p class="text-slate-700 leading-relaxed">
                    {{ Str::limit($post->excerpt ?? $post->body, 180) }}
                </p>

            </article>
        @endforeach
    </div>

    {{-- PAGINATION --}}
    <div class="mt-10">
        {{ $posts->links() }}
    </div>

</x-layout>
