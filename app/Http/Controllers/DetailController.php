<?php

namespace App\Http\Controllers;
use App\Models\TourPackage;
use Illuminate\Http\Request;


class DetailController extends Controller
{
    // show the detail page
    public function index(Request $request, $slug)
    {
        //get the tour package detail with gallery and slug from url and return to view with items
        $item = TourPackage::with(['galleries'])->where('slug', $slug)->firstorFail();
        return view('pages.detail',[
            'item' => $item
        ]);
        
    }
}
