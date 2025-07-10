<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'API Manager') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Or mix() --}}
    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-900 min-h-screen">

    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md hidden md:block">
            <div class="p-4 text-xl font-semibold border-b">API Dashboard</div>
            <nav class="p-4 space-y-2">
                <a href="/dashboard/api-keys"
                    class="block px-3 py-2 rounded hover:bg-gray-100 {{ request()->is('dashboard/api-keys') ? 'bg-gray-100 font-semibold' : '' }}">
                    🔑 API Keys
                </a>
                {{-- Add more nav items here --}}
            </nav>
        </aside>

        {{-- Main content --}}
        <div class="flex-1 flex flex-col">
            {{-- Top bar --}}
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">
                    @yield('title', 'Dashboard')
                </h1>
                <div>
                    <span class="mr-2">👤 {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="text-blue-600 hover:underline text-sm">Logout</button>
                    </form>
                </div>
            </header>

            {{-- Content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @livewireScripts
</body>

</html>
