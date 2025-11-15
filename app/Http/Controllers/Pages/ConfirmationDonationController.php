<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class ConfirmationDonationController
{
    public function index()
    {
        return view('pages.confirmation-donation');
    }

    public function searchInvoice(Request $request)
    {
        $orderId = $request->input('order_id');
        $donation = Donation::where('order_id', $orderId)->first();
        if (!$donation) {
            return back()->with('danger', 'Mohon maaf, invoice anda tidak ditemukan.');
        }

        return redirect()->route('pages.bill-invoice', $orderId)->with('success', 'Berhasil menemukan invoice anda.');
    }
}
