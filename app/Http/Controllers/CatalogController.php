<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        // Все категории и бренды
        $categories = Category::all();
        $brands = Brand::all();

        // Базовый запрос товаров с подгрузкой категории и бренда
        $query = Product::with(['category', 'brand']);

        // Фильтр по категории
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Фильтр по бренду
        if ($request->has('brand') && $request->brand) {
            $query->where('brand_id', $request->brand);
        }

        // Получаем товары
        $products = $query->get();

        // Передаем данные в Blade
        return view('catalog', compact('categories', 'brands', 'products'));
    }
}
