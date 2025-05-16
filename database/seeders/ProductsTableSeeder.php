<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Produk 1',
            'price' => 100000,
            'category' => 'Elektronik',
        ]);

        DB::table('products')->insert([
            'name' => 'Produk 2',
            'price' => 200000,
            'category' => 'Pakaian',
        ]);
    }
}
    