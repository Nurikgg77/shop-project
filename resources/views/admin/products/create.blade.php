<!DOCTYPE html>
<html>
<head>
    <title>Добавить товар</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">

<h1 class="text-2xl font-bold mb-6">Добавить товар</h1>

<<form method="POST" action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    <input type="text" name="name" value="{{ $product->name ?? '' }}" placeholder="Название товара" class="border p-2 w-full mb-3">
    <input type="number" name="price" value="{{ $product->price ?? '' }}" placeholder="Цена" class="border p-2 w-full mb-3">
    <input type="number" name="year" value="{{ $product->year ?? '' }}" placeholder="Год выпуска" class="border p-2 w-full mb-3">

    {{-- Категория --}}
    <select name="category_id" class="border p-2 w-full mb-3">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" @if(isset($product) && $product->category_id==$cat->id) selected @endif>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>

    {{-- Бренд --}}
    <select name="brand_id" class="border p-2 w-full mb-3">
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" @if(isset($product) && $product->brand_id==$brand->id) selected @endif>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>

    {{-- Картинка --}}
    <input type="file" name="image" class="border w-full p-2 mb-3">

    @if(isset($product) && $product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="w-32 h-32 object-cover mb-3">
    @endif

    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded">Сохранить</button>
</form>
@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6">Добавить категорию</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Название категории" class="w-full border p-2 rounded">
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Сохранить</button>
    </form>
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
<form method="POST" action="...">
    @csrf
