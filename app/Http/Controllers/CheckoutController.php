<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // show the checkout page
    public function index(Request $request)
    {
        return view('pages.checkout');
    }

    // show 
    public function success(Request $request)
    {
        return view('pages.success');
    }
}
