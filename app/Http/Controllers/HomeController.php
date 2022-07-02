<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{   
    


    // show the home page
    public function index(Request $request)
    {
        return view('pages.home');
    }
}
