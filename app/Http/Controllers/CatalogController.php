<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();

        return view('catalog', compact('categories', 'products'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $products = $category->products()->with('category')->get();

        return view('catalog', compact('categories', 'products', 'category'));
    }
}
