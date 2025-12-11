<x-layout>
<x-slot:title>Blog</x-slot:title>
<x-slot:header>
<h2 class="text-xl font-semibold text-white">Blog & Artikel</h2>
</x-slot:header>


<div class="bg-transparent">
<div class="p-6 border border-gray-800 rounded-lg">
<h1 class="text-3xl font-bold text-white mb-2">Wawasan & Cerita</h1>
<p class="text-gray-400 mb-6">Temukan artikel terbaru, tutorial, dan update menarik seputar teknologi dan pengembangan web di sini.</p>
<a href="/posts" class="inline-block px-6 py-3 border rounded-md text-white btn-premium hover-gold">Lihat Semua Postingan</a>
</div>


<div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
@foreach($posts as $post)
<article class="p-6 card-elite rounded-lg">
<h3 class="text-xl font-semibold text-white mb-2"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
<p class="text-gray-300 text-sm mb-4">{{ $post->excerpt }}</p>
<a href="/posts/{{ $post->slug }}" class="text-sm text-gray-200 underline">Baca selengkapnya</a>
</article>
@endforeach
</div>
</div>
</x-layout>