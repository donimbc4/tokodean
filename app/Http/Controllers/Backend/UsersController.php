<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $userList = User::paginate(10);
        return view('backend.master-data.users.users', [
            'userList' => $userList
        ]);
    }
}
