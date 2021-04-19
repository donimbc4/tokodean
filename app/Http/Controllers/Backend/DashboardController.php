<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        
        return view('backend.dashboard.dashboard', [
        ]);
    }
}
