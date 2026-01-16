@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Бренды</h1>

    <a href="{{ route('admin.brands.create') }}" class="px-4 py-2 bg-green-600 text-white rounded mb-4 inline-block">
        Добавить бренд
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
            @forelse($brands as $brand)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $brand->id }}</td>
                <td class="px-4 py-2">{{ $brand->name }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.brands.edit', $brand) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Редактировать</a>
                    <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="px-2 py-1 bg-red-500 text-white rounded">Удалить</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-4">Бренды отсутствуют</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
