@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Добавить бренд</h1>

    <form action="{{ route('admin.brands.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Название</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name') }}">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Сохранить</button>
    </form>
</div>
@endsection
