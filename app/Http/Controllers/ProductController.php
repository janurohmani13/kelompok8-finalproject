<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil data produk dari database (misalnya)
        $products = \App\Models\Product::all();

        return view('products.index', compact('products'));
    }
}
