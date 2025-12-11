<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-slate-100">

    {{-- NAVBAR --}}
    <nav class="bg-white border-b shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">

            {{-- LOGO --}}
            <a href="/" class="text-2xl font-bold text-slate-900">Valdronout</a>

            {{-- MENU --}}
            <div class="flex items-center gap-6 text-slate-800 font-medium">

                <a href="/" class="hover:text-indigo-600 transition">Home</a>
                <a href="/about" class="hover:text-indigo-600 transition">About</a>
                <a href="/posts" class="hover:text-indigo-600 transition">Posts</a>
                <a href="/categories" class="hover:text-indigo-600 transition">Categories</a>

                @auth
                    <a href="/dashboard" class="hover:text-indigo-600 transition">Dashboard</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="text-red-600 hover:text-red-800 transition">
                            Logout
                        </button>
                    </form>

                @else
                    <a href="/login"
                       class="px-3 py-1.5 border rounded-lg hover:bg-slate-100 transition">
                       Login
                    </a>
                    <a href="/register"
                       class="px-3 py-1.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                       Register
                    </a>
                @endauth

            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-10">
        {{ $slot }}
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
