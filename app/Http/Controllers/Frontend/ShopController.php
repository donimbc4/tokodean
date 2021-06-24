<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Products\MProducts;
use App\Models\Products\MProductsPhoto;
use App\Models\CategoryProducts\MCategoryProducts;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $category = MCategoryProducts::select('name', 'slug', 'image')
            ->where('flag_active', MCategoryProducts::ACTIVE)
        ->get();

        $product = MProducts::select('m_product.id', 'm_product.name', 'm_product.slug', 'm_product.price', 'm_product.thumbnail', 'm_product.description')
            ->leftJoin('m_category_products', 'm_product.category_product_id', 'm_category_products.id')
        ->where('m_product.flag_active', MProducts::ACTIVE);

        if ($request->category != null) {
            $product = $product->where('m_category_products.slug', $request->category);
        }

        $product = $product->paginate(12);

        $product = $product->appends(request()->query());

        return view('frontend.shop.index', [
            'category'  => $category,
            'product'   => $product
        ]);
    }
}
