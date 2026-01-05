<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-50 antialiased">
    <div class="max-w-7xl mx-auto px-4 py-12">

        {{-- Заголовок --}}
        <h1 class="text-4xl font-extrabold text-gray-900 mb-8">
            Наш Каталог
        </h1>

        {{-- Категории --}}
        <div class="flex flex-wrap gap-3 mb-10">
            {{-- Все продукты --}}
            <a href="{{ url('/') }}" 
               class="px-5 py-2 rounded-full {{ !isset($category) ? 'bg-gray-900 text-white' : 'bg-white border text-gray-700' }} text-sm font-semibold">
                Все
            </a>

            {{-- Категории --}}
            @foreach($categories as $cat)
                <a href="{{ route('category.show', $cat->id) }}" 
                   class="px-5 py-2 rounded-full 
                          {{ isset($category) && $category->id === $cat->id ? 'bg-gray-900 text-white' : 'bg-white border text-gray-700' }} 
                          text-sm font-semibold shadow-sm">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        {{-- Товары --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition">

                    {{-- Категория продукта --}}
                    <span class="text-xs font-semibold uppercase tracking-wider text-indigo-600">
                        {{ $product->category->name }}
                    </span>

                    {{-- Название --}}
                    <h2 class="text-xl font-bold text-gray-800 mt-2">
                        {{ $product->name }}
                    </h2>

                    {{-- Цена и год --}}
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-2xl font-black text-gray-900">
                            ${{ $product->price }}
                        </span>
                        <span class="text-sm text-gray-400 italic">
                            {{ $product->year }} г.
                        </span>
                    </div>

                    {{-- Кнопка Купить --}}
                    <button class="w-full mt-6 bg-indigo-600 text-white py-2 rounded-xl hover:bg-indigo-700 transition">
                        Купить
                    </button>

                </div>
            @endforeach
        </div>

    </div>
</body>
