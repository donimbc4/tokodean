<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = DB::table('m_category')
            ->select('name')
            ->where('flag_active', 1)
        ->get();
        
        return view('frontend.home.index', [
            'category'  => $category
        ]);
    }
}
