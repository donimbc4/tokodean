<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use BackendHelper;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post'))
        {
            BackendHelper::sendEmail($request);
        }
        return view('frontend.cart.index', []);
    }
}