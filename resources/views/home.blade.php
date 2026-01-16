@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Наши продукты</h1>

    @if($products->count())
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white shadow rounded p-4">
                    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                    <p>Категория: {{ $product->category->name ?? 'Нет' }}</p>
                    <p>Бренд: {{ $product->brand->name ?? 'Нет' }}</p>
                    <p>Цена: ${{ $product->price }}</p>
                    <p>Год: {{ $product->year }}</p>
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="mt-2 h-32 w-full object-cover rounded">
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Товары отсутствуют</p>
    @endif
</div>
@endsection
