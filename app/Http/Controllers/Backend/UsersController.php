<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Exception;

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

    public function create(Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                DB::beginTransaction();
                $user               = new User;
                $user->username     = $request->username;
                $user->name         = $request->name;
                $user->email        = $request->email;
                $user->password     = bcrypt($request->password);
                $user->created_at   = date('Y-m-d H:i:s');
                $user->flag_active  = User::ACTIVE; #DEFAULT ACTIVE
                $user->save();
                DB::commit();
                
                return redirect('panel/master-data/users')->with('success','Sukses membuat user.');
            }

            return view('backend.master-data.users.create-user');
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/users')->with('danger','Gagal membuat user.');
        }
    }

    public function update($id, Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                DB::beginTransaction();
                $user               = User::find(Crypt::decryptString($id));
                $user->name         = $request->name;
                $user->email        = $request->email;
                if ($request->password != null) {
                    $user->password     = bcrypt($request->password);
                }
                $user->updated_at   = date('Y-m-d H:i:s');
                $user->is_admin     = $request->is_admin;
                $user->flag_active  = $request->flag_active;
                $user->save();
                DB::commit();
                
                return redirect('panel/master-data/users')->with('success', 'Sukses mengubah user.');
            }
            
            $user = User::where('id', Crypt::decryptString($id))->first();
            $cabang = Cabang::select('id', 'name')->get();
            
            return view('backend.master-data.users.update-user', [
                'user'   => $user,
                'cabang' => $cabang
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/users')->with('danger', 'Gagal mengubah user.');
        }
    }
}
