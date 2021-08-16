<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post'))
        {
            dd($request->all());
        }
        return view('frontend.checkout.index', []);
    }
}