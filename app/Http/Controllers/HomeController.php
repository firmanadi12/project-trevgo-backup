<?php

namespace App\Http\Controllers;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    
    
    public function index(Request $request)
    {
        //get the tour package with gallery
        $items = TourPackage::with(['galleries'])->get();
        
        //return view with items
        return view('pages.home',[
            'items' => $items,
            'testimonies' => []
        ]);
        
    }
}
