<?php

namespace Database\Seeders;

use App\Models\Sales;
use App\Models\Product;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        // Ambil produk contoh
        $product = Product::first();

        // Insert data penjualan contoh
        Sales::create([
            'product_id' => $product->id,
            'quantity' => 10,
            'total_price' => $product->price * 10,
            'sale_date' => now(),
        ]);
    }
}
