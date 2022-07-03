<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourPackage;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        // show the admin dashboard
        return view('pages.admin.dashboard',[
            'tour_package' => TourPackage::count(),
            'transaction' => Transaction::count(),
            'transaction_pending' => Transaction::where('transaction_status','PENDING')->count(),
            'transaction_success' => Transaction::where('transaction_status','SUCCESS')->count()
        ]);

    }
}