<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Products\MProducts;
use App\Models\Products\MProductsPhoto;

class ProductController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $product = MProducts::select('id', 'name', 'slug', 'price', 'thumbnail', 'description')
            ->where('flag_active', MProducts::ACTIVE)
            ->where('slug', $slug)
        ->first();

        $productPhoto = MProductsPhoto::select('photo')
            ->where('flag_active', MProductsPhoto::ACTIVE)
            ->where('product_id', $product->id)
        ->get();

        return view('frontend.product.detail', [
            'product'       => $product,
            'productPhoto'  => $productPhoto
        ]);
    }
}
