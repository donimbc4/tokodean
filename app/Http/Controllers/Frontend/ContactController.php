<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post'))
        {
            dd($request->all());
        }
        return view('frontend.contact.index', []);
    }
}