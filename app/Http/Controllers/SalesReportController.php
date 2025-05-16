<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    public function index()
    {
        // Ambil data laporan penjualan dari database (misalnya)
        $sales = \App\Models\Sales::all();

        return view('sales.report', compact('sales'));
    }
}
