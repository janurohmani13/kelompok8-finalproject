<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Relasi ke produk
            $table->integer('quantity'); // Jumlah yang terjual
            $table->decimal('total_price', 10, 2); // Total harga (quantity * harga produk)
            $table->date('sale_date'); // Tanggal penjualan
            $table->timestamps();

            // Menambahkan relasi ke tabel produk
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
