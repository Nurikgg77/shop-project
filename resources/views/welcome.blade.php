<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-50 antialiased">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-8">Каталог</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(\App\Models\Product::all() as $product)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition">
                <span class="text-xs font-semibold uppercase tracking-wider text-indigo-600">
                    {{ $product->category->name }}
                </span>
                <h2 class="text-xl font-bold text-gray-800 mt-2">{{ $product->name }}</h2>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-2xl font-black text-gray-900">${{ $product->price }}</span>
                    <span class="text-sm text-gray-400 italic">{{ $product->year }} г.</span>
                </div>
                <button class="w-full mt-6 bg-indigo-600 text-white py-2 rounded-xl hover:bg-indigo-700 transition">
                    Купить
                </button>
            </div>
            @endforeach
        </div>
    </div>
   

</body>