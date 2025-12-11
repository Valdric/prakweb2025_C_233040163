@extends('dashboard.layouts.main')

@section('container')
<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-10 flex justify-between items-center">
        <h1 class="text-4xl font-bold text-slate-900">Postingan Saya</h1>

        <a href="{{ route('dashboard.posts.create') }}"
           class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700 transition font-semibold">
            + Buat Post Baru
        </a>
    </div>

    {{-- POPUP SUCCESS --}}
    @if(session('success'))
        <div id="popup-success"
            class="p-4 mb-6 text-green-900 bg-green-100 border border-green-300 rounded-xl animate-fade-in shadow">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const el = document.getElementById('popup-success');
                if (el) el.classList.add('animate-fade-out');
                setTimeout(() => el.remove(), 400);
            }, 2000);
        </script>
    @endif

    {{-- TABLE CARD --}}
    <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-200">

        <table class="w-full text-slate-800">
            <thead>
                <tr class="border-b bg-slate-50 text-slate-600 font-semibold">
                    <th class="py-4 text-left">Judul</th>
                    <th class="py-4 text-center">Kategori</th>
                    <th class="py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-slate-700">
                @foreach($posts as $post)
                <tr class="border-b hover:bg-slate-50 transition">

                    {{-- JUDUL --}}
                    <td class="py-4">
                        <div class="flex flex-col">
                            <span class="font-semibold text-slate-900 text-lg hover:text-indigo-700 transition">
                                {{ $post->title }}
                            </span>
                            <span class="text-sm text-slate-500 mt-1">
                                Dibuat oleh
                                <span class="font-semibold text-slate-700">
                                    {{ $post->user->name }}
                                </span>
                                — {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </td>

                    {{-- KATEGORI --}}
                    <td class="py-4 text-center">
                        <span class="px-3 py-1 rounded-lg text-sm bg-indigo-100 text-indigo-700 shadow-sm font-semibold">
                            {{ $post->category->name }}
                        </span>
                    </td>

                    {{-- AKSI --}}
                    <td class="py-4 text-center">
                        <div class="flex justify-center items-center gap-6">

                            {{-- LIHAT --}}
                            <a href="{{ route('dashboard.posts.show', $post->id) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium transition">
                                Lihat
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('dashboard.posts.edit', $post->id) }}"
                               class="text-yellow-600 hover:text-yellow-800 font-medium transition">
                                Edit
                            </a>

                            {{-- HAPUS --}}
                            <form action="{{ route('dashboard.posts.destroy', $post->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin mau menghapus postingan ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="text-red-600 hover:text-red-800 font-medium transition">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- PAGINATION --}}
        <div class="mt-8">
            {{ $posts->links() }}
        </div>

    </div>

</div>
@endsection
