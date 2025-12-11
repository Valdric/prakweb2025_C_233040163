<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel Practice' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: radial-gradient(circle at top, #1a1a1a 0%, #0e0e0e 40%, #000000 100%);
            color: #f5f5f5;
        }

        nav {
            background: linear-gradient(to right, #800000, #b30000, #ff0000);
            padding: 18px 0;
            box-shadow: 0 4px 12px rgba(255, 0, 0, 0.2);
        }

        nav a {
            color: rgb(255, 225, 225);
            font-weight: 600;
            margin-right: 28px;
            transition: 0.25s ease;
        }

        nav a:hover {
            color: white;
            text-shadow: 0 0 10px red;
        }

        footer {
            border-top: 1px solid #222;
            padding: 20px 0;
            color: #777;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 22px;
            backdrop-filter: blur(6px);
            transition: 0.3s ease;
        }

        .content-card:hover {
            border-color: rgba(255, 0, 0, 0.5);
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.25);
        }
    </style>
</head>

<body>
    {{-- NAVBAR --}}
    <nav>
        <div class="container mx-auto flex items-center">
            <a href="{{ route('home') }}" style="font-size: 1.3rem;">HOME</a>
            <a href="{{ route('posts.index') }}">BLOG</a>
            <a href="{{ route('categories.index') }}">CATEGORIES</a>

            <a href="{{ route('about') }}" class="ml-auto">ABOUT</a>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <main class="container mx-auto py-12">
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <footer class="text-center">
        © {{ date('Y') }} – Fakultas Teknik Universitas Pasundan
    </footer>
</body>
</html>
