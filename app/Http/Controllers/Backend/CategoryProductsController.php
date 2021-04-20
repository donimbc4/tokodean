<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use Exception;

use App\Models\CategoryProducts\MCategoryProducts;

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
        try
        {
            if ($request->isMethod('post'))
            {
                DB::beginTransaction();
                $mCategoryProducts               = new MCategoryProducts;
                $mCategoryProducts->name         = $request->name;
                $mCategoryProducts->flag_active  = MCategoryProducts::ACTIVE; #DEFAULT ACTIVE
                $mCategoryProducts->created_by   = Auth::user()->id;
                $mCategoryProducts->created_at   = date('Y-m-d H:i:s');
                $mCategoryProducts->save();
                DB::commit();
                
                return redirect('panel/master-data/category-products')->with('success','Sukses membuat Category Products.');
            }

            return view('backend.master-data.category-products.create-category-products');
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/category-products')->with('danger','Gagal membuat Category Products.');
        }
    }

    public function update($id, Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                DB::beginTransaction();
                $mCategoryProducts               = MCategoryProducts::find(Crypt::decryptString($id));
                $mCategoryProducts->name         = $request->name;
                $mCategoryProducts->flag_active  = $request->flag_active;
                $mCategoryProducts->updated_by   = Auth::user()->id;
                $mCategoryProducts->updated_at   = date('Y-m-d H:i:s');
                $mCategoryProducts->save();
                DB::commit();
                
                return redirect('panel/master-data/category-products')->with('success', 'Sukses mengubah Category Products.');
            }
            
            $user = User::where('id', Crypt::decryptString($id))->first();
            $cabang = Cabang::select('id', 'name')->get();
            
            return view('backend.master-data.category-products.update-category-products');
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/category-products')->with('danger', 'Gagal mengubah Category Products.');
        }
    }
}
