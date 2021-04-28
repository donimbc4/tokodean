<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Models\MasterData\Banner\MBanner;
use App\Models\CategoryProducts\MCategoryProducts;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banner = MBanner::select('name', 'image')
            ->where('flag_active', MBanner::ACTIVE)
        ->get();

        $category = MCategoryProducts::select('name', 'image')
            ->where('flag_active', MCategoryProducts::ACTIVE)
        ->get();
        
        return view('frontend.home.index', [
            'banner'    => $banner,
            'category'  => $category
        ]);
    }
}
