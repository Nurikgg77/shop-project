<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::with(['category','brand']);

        if (request('category')) {
            $products->where('category_id', request('category'));
        }

        if (request('brand')) {
            $products->where('brand_id', request('brand'));
        }

        $products = $products->get();

        return view('catalog', compact('products','categories','brands'));
    }
}
