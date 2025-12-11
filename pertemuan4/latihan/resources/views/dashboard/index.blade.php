<x-layout>
  <h1 class="text-2xl font-bold">Dashboard</h1>
  <p class="mt-2">Welcome, {{ auth()->user()->name }}</p>

  <div class="mt-4">
    <a href="{{ route('dashboard.posts.index') }}" class="px-3 py-2 bg-indigo-600 text-white rounded">Manage Posts</a>
  </div>
</x-layout>
