<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-50 antialiased">
<div class="max-w-7xl mx-auto px-4 py-12">

    {{-- Заголовок --}}
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8">
        Наш Каталог
    </h1>

    {{-- Категории --}}
    <div class="mb-6 flex flex-wrap gap-3">
        <a href="{{ url('/') }}"
           class="px-4 py-2 rounded-full border {{ !request('category') ? 'bg-black text-white' : '' }}">
            Все категории
        </a>

        @foreach($categories as $cat)
            <a href="{{ request()->fullUrlWithQuery(['category' => $cat->id]) }}"
               class="px-4 py-2 rounded-full border
               {{ request('category') == $cat->id ? 'bg-black text-white' : '' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    {{-- Бренды --}}
    <div class="mb-10 flex flex-wrap gap-3">
        <a href="{{ request()->fullUrlWithQuery(['brand' => null]) }}"
           class="px-4 py-2 rounded-full border {{ !request('brand') ? 'bg-black text-white' : '' }}">
            Все бренды
        </a>

        @foreach($brands as $brand)
            <a href="{{ request()->fullUrlWithQuery(['brand' => $brand->id]) }}"
               class="px-4 py-2 rounded-full border
               {{ request('brand') == $brand->id ? 'bg-black text-white' : '' }}">
                {{ $brand->name }}
            </a>
        @endforeach
    </div>

    {{-- Товары --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-white p-6 rounded-xl shadow border">

                {{-- Категория и бренд --}}
                <div class="text-xs text-indigo-600 font-bold uppercase">
                    {{ $product->category->name ?? '' }} · {{ $product->brand->name ?? '' }}
                </div>

                {{-- Название товара --}}
                <h2 class="text-xl font-bold mt-2">{{ $product->name }}</h2>

                {{-- Изображение товара --}}
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="w-full h-48 object-cover rounded-lg my-4">
                @else
                    <div class="w-full h-48 bg-gray-200 rounded-lg my-4 flex items-center justify-center">
                        <span class="text-gray-400">Нет изображения</span>
                    </div>
                @endif

                {{-- Цена и год --}}
                <div class="flex justify-between mt-4">
                    <span class="text-2xl font-black">${{ $product->price }}</span>
                    <span class="text-gray-400">{{ $product->year }} г.</span>
                </div>

                {{-- Кнопка --}}
                <button class="mt-4 w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
                    Купить
                </button>

            </div>
        @empty
            <div class="col-span-3 text-center text-gray-400 text-xl">
                Ничего не найдено 😢
            </div>
        @endforelse
    </div>

    {{-- Админка --}}
    @auth
        @if(auth()->user()->is_admin)
            <div class="mt-8">
                <a href="{{ url('/admin') }}"
                   class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Админка
                </a>
            </div>
        @endif
    @endauth

</div>
</body>
