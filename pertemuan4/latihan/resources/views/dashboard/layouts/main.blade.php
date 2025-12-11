<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">

    {{-- POPUP SUCCESS --}}
    @if(session('success'))
    <div id="popup-success"
         class="fixed top-5 right-5 bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg animate-fade-in z-50">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const popup = document.getElementById('popup-success');
            popup.classList.add('animate-fade-out');
            setTimeout(() => popup.remove(), 400);
        }, 2500);
    </script>
    @endif

    {{-- NAVBAR --}}
    <nav class="bg-white border-b border-gray-200 shadow-sm px-4 py-3">
        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <a href="/" class="text-xl font-bold text-gray-800">
                Dashboard
            </a>

            <div class="flex items-center gap-4">
                <span class="text-gray-700">Hi, {{ auth()->user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="flex">

        {{-- SIDEBAR --}}
        <aside class="w-60 min-h-screen bg-white shadow-md p-5">
            <h2 class="text-lg font-bold text-gray-700 mb-4">Menu</h2>

            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard.index') }}"
                       class="block px-3 py-2 rounded-lg hover:bg-gray-200">
                        Dashboard Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.posts.index') }}"
                       class="block px-3 py-2 rounded-lg hover:bg-gray-200">
                        Kelola Post
                    </a>
                </li>
            </ul>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-8">
            @yield('container')
        </main>

    </div>

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>
