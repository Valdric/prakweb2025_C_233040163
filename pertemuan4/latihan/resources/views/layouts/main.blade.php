<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Valdronout' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-slate-50 text-slate-900">

    {{-- NAVBAR --}}
    <nav class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="/" class="text-2xl font-bold text-slate-900">
                Valdronout
            </a>

            <div class="flex items-center gap-6 font-medium">
                <a href="/" class="hover:text-blue-600 transition">Home</a>
                <a href="/posts" class="hover:text-blue-600 transition">Posts</a>
                <a href="/categories" class="hover:text-blue-600 transition">Categories</a>

                @auth
                <a href="/dashboard" class="text-blue-600 font-semibold">Dashboard</a>
                @endauth

                @guest
                <a href="/login" class="hover:text-blue-600 transition">Login</a>
                @endguest
            </div>
        </div>
    </nav>

    {{-- CONTENT --}}
    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('container')
    </main>

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>
