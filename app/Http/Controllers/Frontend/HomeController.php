<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Models\Products\MProducts;
use App\Models\MasterData\Banner\MBanner;
use App\Models\CategoryProducts\MCategoryProducts;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $product = MProducts::select('id', 'name', 'slug', 'price', 'thumbnail')
            ->where('flag_active', MProducts::ACTIVE)
            ->orderBy('created_at', 'DESC')
            ->limit(8)
        ->get();

        $banner = MBanner::select('name', 'image')
            ->where('flag_active', MBanner::ACTIVE)
        ->get();

        $category = MCategoryProducts::select('name', 'slug', 'image')
            ->where('flag_active', MCategoryProducts::ACTIVE)
        ->get();
        
        return view('frontend.home.index', [
            'product'   => $product,
            'banner'    => $banner,
            'category'  => $category
        ]);
    }
}
