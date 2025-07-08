<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\MidtransService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    /**
     * Generate Snap Token dari Midtrans
     */
    public function getSnapToken(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|integer|exists:transactions,id',
        ]);

        $transaction = Transaction::with('user')->findOrFail($request->transaction_id);

        if (!$transaction->total_price || $transaction->total_price <= 0) {
            return response()->json(['message' => 'Invalid total amount.'], 422);
        }

        $orderId = 'TRENZ-' . $transaction->id . '-' . strtoupper(Str::random(5));
        $transaction->order_id = $orderId;
        $transaction->save();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $transaction->total_price,
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name ?? 'Customer',
                'email' => $transaction->user->email ?? 'noemail@example.com',
            ],
            'callbacks' => [
                'finish' => 'http://localhost:4200/transaction-success',
            ],
            'notification_url' => 'http://localhost:4200/api/midtrans/notification'
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            if (!$snapToken) {
                return response()->json(['message' => 'Failed to receive Snap token.'], 500);
            }

            // Simpan data token ke payment (optional)
            $payment = $transaction->payment ?? $transaction->payments()->create();
            $payment->method = 'midtrans';
            $payment->snap_token = $snapToken;
            $payment->status = 'paid';
            $payment->save();

            Log::debug('Generated Snap Token:', ['token' => $snapToken]);

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Midtrans Snap Token Error: ' . $e->getMessage());
            return response()->json(['message' => 'Server error saat generate Snap token.'], 500);
        }
    }

    /**
     * Handle Midtrans Notification
     */
    public function handleNotification(Request $request)
    {
        Log::info('Midtrans Notification Received', [
            'json' => $request->all()
        ]);

        $data = $request->all();
        $orderId = $data['order_id'] ?? null;
        $transactionStatus = $data['transaction_status'] ?? null;

        $parts = explode('-', $orderId);
        $id = $parts[1] ?? null;

        if (!$id || !is_numeric($id)) {
            return response()->json(['message' => 'Invalid order_id'], 400);
        }

        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Update status transaksi
        if ($transactionStatus === 'setlement   ') {
            $transaction->status = 'paid';
        } elseif ($transactionStatus === 'pending') {
            $transaction->status = 'pending';
        } elseif (in_array($transactionStatus, ['cancel', 'expire'])) {
            $transaction->status = 'failed';
        } else {
            $transaction->status = $transactionStatus;
        }

        $transaction->save();

        $payment = $transaction->payment ?? $transaction->payments()->latest()->first();
        if ($payment) {
            $payment->status = $transaction->status;
            $payment->save();
        }

        Log::info("Midtrans notification processed successfully for OrderID: {$orderId}");

        return response()->json(['message' => 'Notification handled'], 200);
    }

    public function getTransactionDetails($orderId)
{
    $transaction = Transaction::with('transactionDetails.product')->where('order_id', $orderId)->first();

    if (!$transaction) {
        return response()->json(['message' => 'Transaction not found'], 404);
    }

    // Collect transaction and product details
    $transactionDetails = $transaction->transactionDetails->map(function($detail) {
        return [
            'product_id' => $detail->product_id,
            'quantity' => $detail->quantity,
            'price_per_item' => $detail->price_per_item,
            'total_price' => $detail->price_per_item * $detail->quantity,
        ];
    });

    return response()->json([
        'order_id' => $transaction->order_id,
        'total_price' => $transaction->total_price,
        'transaction_details' => $transactionDetails,
    ]);
}

}
