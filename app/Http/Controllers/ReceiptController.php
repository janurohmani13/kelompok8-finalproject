<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReceiptController extends Controller
{
    // Menampilkan halaman struk sebagai HTML
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return abort(404, 'Transaction not found');
        }

        return view('receipt', ['transaction' => $transaction]);
    }

    // Fungsi untuk mengonversi struk menjadi gambar JPG
    public function generateReceiptImage($id)
    {
        try {
            // URL halaman struk
            $url = route('receipt', ['id' => $id]);

            // Path output untuk gambar
            $outputPath = storage_path("app/public/receipts/receipt-{$id}.jpg");

            // Command wkhtmltoimage untuk mengonversi HTML menjadi JPG
            $command = "wkhtmltoimage --quality 90 $url $outputPath";

            // Menjalankan command
            exec($command, $output, $returnVar);

            if ($returnVar !== 0) {
                return response()->json(['message' => 'Error generating image.'], 500);
            }

            // Gambar berhasil dibuat, kirim sebagai response
            return response()->download($outputPath);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error generating image.'], 500);
        }
    }
}

?>