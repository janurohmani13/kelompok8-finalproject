<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'total_price', 'date']; // Sesuaikan dengan kolom di tabel penjualan
}
