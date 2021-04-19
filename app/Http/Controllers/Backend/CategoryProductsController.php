<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class CategoryProductsController extends Controller
{
    public function index(Request $request)
    {
        $categoryProductList = DB::table('m_category')->paginate(10);
        return view('backend.master-data.category-products.category-products', [
            'categoryProductList' => $categoryProductList
        ]);
    }

    public function create(Request $request)
    {
        return view('backend.master-data.category-products.create-category-products');
    }
}
