@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Главная страница</h1>
    <p>Добро пожаловать на наш сайт!</p>

    <h2 class="text-2xl mt-8 mb-4">Товары</h2>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} — ${{ $product->price }}</li>
        @endforeach
    </ul>
</div>
@endsection
