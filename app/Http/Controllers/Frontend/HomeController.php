<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Models\CategoryProducts\MCategoryProducts;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = MCategoryProducts::select('name', 'image')
            ->where('flag_active', 1)
        ->get();
        
        return view('frontend.home.index', [
            'category'  => $category
        ]);
    }
}
