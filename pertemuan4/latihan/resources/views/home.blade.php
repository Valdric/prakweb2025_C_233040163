<x-layout>

    {{-- HERO SECTION --}}
    <section class="text-center py-20">
        <h1 class="text-5xl font-bold text-slate-900 mb-6">
            Selamat datang di Valdronout
        </h1>

        <p class="text-lg text-slate-600 mb-10">
            Halo, ingat Tumblermya jangan ilang ya.
        </p>

        <a href="/posts"
           class="px-6 py-3 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700 transition font-semibold">
            Lihat Posts
        </a>
    </section>

    {{-- FOOTER --}}
    <footer class="mt-20 text-center text-slate-500 py-10 border-t">
        © {{ date('Y') }} Valdronout — All rights reserved.
    </footer>

</x-layout>
