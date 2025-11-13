<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Models\Donation;

class MidtransController
{
    public function createTransaction(string $id, Request $request)
    {
        $orderId = 'DONASI-' . time();
        
        $donation = new Donation();

        $donation->order_id = $orderId;
        $donation->full_name = $request->input('full_name');
        $donation->honorary_call = $request->input('honorary_call');
        $donation->email = $request->input('email');
        $donation->phone_number = $request->input('phone_number');
        $donation->hope = $request->input('hope');
        $donation->bank = $request->input('bank');
        $donation->amount = $request->input('amount');
        $donation->status = 'Menunggu';
        $donation->program_id = $id;

        $donation->save();
        
        $params = [
            'payment_type' => 'bank_transfer',
            'transaction_details' => [
                'order_id' => $donation->order_id,
                'gross_amount' => $donation->amount,
            ],
            'bank_transfer' => [
                'bank' => $donation->bank
            ],
            'customer_details' => [
                'first_name' => $donation->full_name,
                'email' => $donation->email,
            ],
        ];

        try {
            $response = \Midtrans\CoreApi::charge($params);
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        dd($donation);
    }
    
    public function callback(Request $request)
    {
        $orderId        = $request->input('order_id');
        $statusCode     = $request->input('status_code');
        $grossAmount    = $request->input('gross_amount');
        $signatureKey   = $request->input('signature_key');
        $transactionStatus = $request->input('transaction_status');
        $fraudStatus    = $request->input('fraud_status');

        $transaction = Donation::where('order_id', $orderId)->first();

        if ($transaction) {
            switch ($transactionStatus) {
                case 'capture':
                    if ($fraudStatus == 'challenge') {
                        $transaction->status = 'Menunggu';
                    } else if ($fraudStatus == 'accept') {
                        $transaction->status = 'Sukses';
                    }
                    break;

                case 'settlement':
                    $transaction->status = 'Sukses';
                    break;

                case 'pending':
                    $transaction->status = 'Menunggu';
                    break;

                case 'deny':
                    $transaction->status = 'Gagal';
                    break;

                case 'expire':
                    $transaction->status = 'Kadaluarsa';
                    break;

                case 'cancel':
                    $transaction->status = 'Dibatalkan';
                    break;

                default:
                    $transaction->status = 'Dibatalkan';
                    break;
            }

            $transaction->save();
        }

        return response()->json(['message' => 'Callback processed successfully']);
    }
}
