<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        // Получаем все товары вместе с их категориями и размерами
        $products = Product::with(['category', 'variants'])->get();
        
        // Передаем их в шаблон (view)
        return view('catalog.index', compact('products'));
    }
}