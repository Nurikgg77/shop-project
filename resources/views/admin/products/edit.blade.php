<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-xl mx-auto p-10">

<h1 class="text-2xl font-bold mb-6">Редактировать товар</h1>

<form method="POST"
      action="{{ route('admin.products.update', $product) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <input name="name" value="{{ $product->name }}" class="border w-full p-2 mb-3">
    <input name="price" value="{{ $product->price }}" class="border w-full p-2 mb-3">
    <input name="year" value="{{ $product->year }}" class="border w-full p-2 mb-3">

    <select name="category_id" class="border w-full p-2 mb-3">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>

    <select name="brand_id" class="border w-full p-2 mb-3">
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}"
                {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>

    {{-- Загрузка картинки --}}
    <input type="file" name="image" class="border w-full p-2 mb-3">

    {{-- Показ текущей картинки --}}
    @if($product->image)
        <img src="{{ asset('storage/'.$product->image) }}"
             class="w-full h-48 object-cover rounded-lg mb-4">
    @endif

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Сохранить
    </button>

</form>

</div>
@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6">Редактировать категорию</h1>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $category->name }}" class="w-full border p-2 rounded">
        <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded">Обновить</button>
    </form>
</div>
@endsection
<form method="POST" action="...">
    @csrf
