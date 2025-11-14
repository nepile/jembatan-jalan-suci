<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\DonationProgram;

class DonationController 
{
    public function index(Request $request)
    {
        $filter = $request->input('status');
        
        $donationQuery = Donation::query();
        
        if ($filter && $filter !== 'Semua') {
            $donationQuery->where('status', $filter);
        }
        
        $getData = $donationQuery->get();
        
        $data = [
            'donations' => $getData,
            'selectedStatus' => $filter ?? 'Semua',
            
            'donationTotal' => Donation::where('status', 'Sukses')->sum('amount'),
            'donaturTotal' => Donation::where('status', 'Sukses')->count(),
            'donationProgramTotal' => DonationProgram::where('status', 'AKTIF')->count(),
        ];
        
        return view('admin.donation', $data);
    }
    
    
}
