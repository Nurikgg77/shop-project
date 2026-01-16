<?php

namespace App\Http\Controllers\Admin;
namespace App\Models;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;



class Product extends Model




{
    protected $fillable = [
        'name',
        'price',
        'year',
        'category_id',
        'brand_id',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request)
{
    dd($request->all(), $request->file('image'));
}


}
