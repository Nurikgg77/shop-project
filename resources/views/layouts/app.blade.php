<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Админ-панель')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Сайдбар -->
    <aside class="w-64 bg-gray-900 text-white p-4">
        <h2 class="text-xl font-bold mb-6">⚙ Админка</h2>

        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.products.index') }}" class="block p-2 hover:bg-gray-700 rounded">
                    📦 Товары
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="block p-2 hover:bg-gray-700 rounded">
                    📁 Категории
                </a>
            </li>
            <li>
                <a href="{{ route('admin.brands.index') }}" class="block p-2 hover:bg-gray-700 rounded">
                    🏷 Бренды
                </a>
            </li>
        </ul>

        <form action="{{ route('logout') }}" method="POST" class="mt-10">
            @csrf
            <button class="w-full bg-red-600 p-2 rounded hover:bg-red-700">
                🚪 Выйти
            </button>
        </form>
    </aside>

    <!-- Контент -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
