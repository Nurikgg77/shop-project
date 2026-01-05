@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">Админка</h1>

    <h2 class="text-2xl font-semibold mb-4">Категории</h2>
    <a href="{{ route('categories.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded mb-4 inline-block">Добавить категорию</a>
    <ul class="mb-12">
        @foreach($categories as $category)
            <li class="flex justify-between p-2 border rounded mb-2">
                {{ $category->name }}
                <span>
                    <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 mr-2">Редактировать</a>
                    <form class="inline" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Удалить</button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>

    <h2 class="text-2xl font-semibold mb-4">Товары</h2>
    <a href="{{ route('products.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded mb-4 inline-block">Добавить товар</a>
    <ul>
        @foreach($products as $product)
            <li class="flex justify-between p-2 border rounded mb-2">
                {{ $product->name }} ({{ $product->category->name }})
                <span>
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 mr-2">Редактировать</a>
                    <form class="inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Удалить</button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</div>
@endsection
