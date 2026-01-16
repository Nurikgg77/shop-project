<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    // Главная страница (фронтенд)
    public function index()
    {
        // Получаем все продукты с категориями и брендами
        $products = Product::with(['category', 'brand'])->latest()->get();

        return view('home', compact('products'));
    }

    // Личный кабинет пользователя
    public function dashboard()
    {
        return view('dashboard');
    }
}
