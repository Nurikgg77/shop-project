<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('admin.dashboard', compact('categories', 'products'));
    }
}
