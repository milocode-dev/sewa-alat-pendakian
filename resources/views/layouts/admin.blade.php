<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-gray-100 flex flex-col">
            <div class="px-6 py-5 border-b border-gray-800">
                <h1 class="text-lg font-bold">Sewa Alat Pendakian</h1>
                <p class="text-xs text-gray-400 mt-1">Admin Panel</p>
            </div>

            <nav class="flex-1 px-3 py-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-3 py-2 rounded text-sm font-medium
                          {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.items.index') }}"
                   class="block px-3 py-2 rounded text-sm font-medium
                          {{ request()->routeIs('admin.alat.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Kelola Alat
                </a>

                <a href="{{ route('admin.categories.index') }}"
                    class="block px-3 py-2 rounded text-sm font-medium
                            {{ request()->routeIs('admin.alat.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Kelola Kategori
                </a>

                {{-- Tambah menu lain di sini, misal Kelola Sewa/Transaksi --}}
            </nav>

            <div class="px-3 py-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-3 py-2 rounded text-sm font-medium text-gray-300 hover:bg-gray-800 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main content --}}
        <div class="flex-1 flex flex-col">

            {{-- Topbar --}}
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold">@yield('title', 'Dashboard')</h2>
                <span class="text-sm text-gray-500">{{ auth()->user()->name }}</span>
            </header>

            {{-- Flash messages --}}
            <div class="px-6 pt-4">
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-3 rounded text-sm mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded text-sm mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>

            {{-- Page content --}}
            <main class="flex-1 px-6 pb-8">
                @yield('content')
            </main>
        </div>

    </div>

</body>
</html>