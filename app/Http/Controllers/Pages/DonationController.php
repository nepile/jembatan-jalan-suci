<?php

namespace App\Http\Controllers\Pages;

use App\Models\Donation;
use App\Models\DonationProgram;
use Illuminate\Http\Request;

class DonationController
{
    public function showDonationFill($slug)
    {
        $data = [
            'program' => DonationProgram::where('slug', $slug)->first()
        ];
        return view('pages.donation-bank', $data);
    }

    public function showBillInvoice($orderId)
    {
        $data = [
            'donation' => Donation::where('order_id', $orderId)->first(),
        ];

        return view('pages.bill-invoice', $data);
    }
}
