<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    // show the detail page
    public function index(Request $request)
    {
        return view('pages.detail');
    }
}
