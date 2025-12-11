<x-layout>

    <h1 class="text-4xl font-bold text-slate-900 mb-10">Category</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($categories as $category)
            <a href="/categories/{{ $category->slug }}"
               class="block bg-white p-6 rounded-2xl border border-slate-200 shadow hover:shadow-lg hover:-translate-y-1 transition duration-200">

                <h2 class="text-2xl font-bold text-indigo-700 mb-2">
                    {{ $category->name }}
                </h2>

                <p class="text-slate-500">
                    Jumlah post: {{ $category->posts_count ?? $category->posts->count() }}
                </p>

            </a>
        @endforeach
    </div>

</x-layout>
