@extends('layouts.main')

@section('container')
<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-md border border-slate-200">

        <h1 class="text-3xl font-bold text-slate-900 mb-6 text-center">
            Register
        </h1>

        {{-- POPUP ERROR --}}
        @if ($errors->any())
            <div id="popup-error"
                class="p-4 mb-6 text-red-900 bg-red-100 border border-red-300 rounded-xl animate-fade-in shadow">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <script>
                setTimeout(() => {
                    const el = document.getElementById('popup-error');
                    if (el) el.classList.add('animate-fade-out');
                    setTimeout(() => el.remove(), 400);
                }, 2000);
            </script>
        @endif

        <form action="{{ route('register.process') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Nama</label>
                <input type="text" name="name"
                       class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500"
                       required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Email</label>
                <input type="email" name="email"
                       class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500"
                       required>
            </div>

            {{-- Password --}}
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500"
                       required>
            </div>

            {{-- Confirm --}}
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500"
                       required>
            </div>

            <button type="submit"
                    class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition shadow">
                Daftar
            </button>

            <p class="text-center text-sm mt-4 text-slate-600">
                Sudah punya akun?
                <a href="{{ route('login.show') }}" class="text-indigo-600 hover:underline">
                    Login
                </a>
            </p>
        </form>

    </div>

</div>
@endsection
