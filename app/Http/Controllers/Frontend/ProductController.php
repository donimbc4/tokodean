<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Products\MProducts;

class ProductController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $product = MProducts::select('name', 'slug', 'price', 'thumbnail', 'description')
            ->where('flag_active', MProducts::ACTIVE)
            ->where('slug', $slug)
        ->first();
        
        return view('frontend.product.detail', [
            'product'   => $product
        ]);
    }
}
