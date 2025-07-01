<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MidtransCallbackController extends Controller
{
    public function callback(Request $request)
    {
        try {
            // Menetapkan konfigurasi Midtrans
            foreach (config('services.midtrans') as $key => $value) {
                Config::${$key} = $value;
            }

            // Ambil notifikasi dari Midtrans
            $notification = new Notification();

            Log::info('Midtrans Notification received:', (array) $notification);

            $transactionStatus = $notification->transaction_status;
            $paymentType = $notification->payment_type;
            $orderId = $notification->order_id;
            $fraudStatus = $notification->fraud_status;
            $midtransTransactionId = $notification->transaction_id;

            // Extract ID transaksi kita
            $parts = explode('-', $orderId); // Contoh: "ORDER-123" => ['ORDER', '123']
            $transactionId = $parts[1] ?? null;

            if (!$transactionId) {
                Log::error("Invalid Order ID format: $orderId");
                return response()->json(['message' => 'Invalid order ID format'], 400);
            }

            // Mencari transaksi berdasarkan ID
            $transaction = Transaction::find($transactionId);
            if (!$transaction) {
                Log::error("Transaction with ID $transactionId not found");
                return response()->json(['message' => 'Transaction not found'], 404);
            }

            // Update status berdasarkan notifikasi
            switch ($transactionStatus) {
                case 'settlement':
                    $transaction->status = 'paid';
                    break;
                case 'expire':
                    $transaction->status = 'expired';
                    break;
                case 'cancel':
                    $transaction->status = 'cancelled';
                    break;
                default:
                    Log::warning("Unhandled transaction status: $transactionStatus");
                    break;
            }

            // Update data lain
            $transaction->payment_type = $paymentType;
            $transaction->midtrans_transaction_id = $midtransTransactionId;
            $transaction->fraud_status = $fraudStatus;
            $transaction->save();

            Log::info("Transaction $transactionId updated to {$transaction->status}");

            return response()->json(['message' => 'Notification handled'], 200);
        } catch (\Exception $e) {
            // Menangani kesalahan tak terduga
            Log::error("An error occurred while handling Midtrans callback: " . $e->getMessage());
            return response()->json(['message' => 'Internal server error'], 500);
        }
    }
}
