@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">

    <h1 class="text-3xl font-bold mb-6">Товары</h1>

    <table class="table-auto w-full bg-white shadow rounded mb-8">
        <thead>
            <tr class="bg-gray-100">
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Бренд</th>
                <th>Цена</th>
                <th>Год</th>
                <th>Фото</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '' }}</td>
                <td>{{ $product->brand->name ?? '' }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->year }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="h-16 w-16 object-cover rounded">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Редактировать</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="px-2 py-1 bg-red-500 text-white rounded">Удалить</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center text-gray-500">Товары отсутствуют</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h1 class="text-3xl font-bold mb-6">Категории</h1>

    <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-green-600 text-white rounded mb-4 inline-block">
        Добавить категорию
    </a>

    <table class="table-auto w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Название</th>
                <th class="px-4 py-2">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $cat)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $cat->id }}</td>
                <td class="px-4 py-2">{{ $cat->name }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.categories.edit', $cat) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Редактировать</a>
                    <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="px-2 py-1 bg-red-500 text-white rounded">Удалить</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-4">Категории отсутствуют</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6">Создать категорию</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-2">Название</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name') }}">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Создать</button>
    </form>
</div>
@endsection
