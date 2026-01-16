@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Редактировать бренд</h1>

    <form action="{{ route('admin.brands.update', $brand) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Название</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name', $brand->name) }}">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Обновить</button>
    </form>
</div>
@endsection
