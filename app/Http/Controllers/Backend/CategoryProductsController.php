<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use Image;
use Storage;
use Exception;
use BackendHelper;

use App\User;
use App\Models\CategoryProducts\MCategoryProducts;

class CategoryProductsController extends Controller
{
    public function index(Request $request)
    {
        $categoryProductList = MCategoryProducts::paginate(10);
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
                if ($request->image !== null)
                {
                    $pathImage = str_replace('public', 'storage', BackendHelper::validationImageBase64($request->image, 'categoryProduct', 720, 660));
                }
                DB::beginTransaction();
                $mCategoryProducts               = new MCategoryProducts;
                $mCategoryProducts->name         = $request->name;
                $mCategoryProducts->slug         = Str::slug($request->name);
                $mCategoryProducts->image        = isset($pathImage) ? $pathImage : '-';
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
                if ($request->image !== null)
                {
                    $pathImage = str_replace('public', 'storage', BackendHelper::validationImageBase64($request->image, 'categoryProduct', 720, 660));
                }
                DB::beginTransaction();
                $mCategoryProducts               = MCategoryProducts::find(\Crypt::decryptString($id));
                $mCategoryProducts->name         = $request->name;
                $mCategoryProducts->slug         = Str::slug($request->name);
                $mCategoryProducts->image        = isset($pathImage) ? $pathImage : $mCategoryProducts->image;
                $mCategoryProducts->flag_active  = $request->status;
                $mCategoryProducts->updated_by   = Auth::user()->id;
                $mCategoryProducts->updated_at   = date('Y-m-d H:i:s');
                $mCategoryProducts->save();
                DB::commit();
                
                return redirect('panel/master-data/category-products')->with('success', 'Sukses mengubah Category Products.');
            }
            
            $mCategoryProducts = MCategoryProducts::where('id', \Crypt::decryptString($id))->first();
            
            return view('backend.master-data.category-products.update-category-products', [
                'mCategoryProducts' => $mCategoryProducts
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/category-products')->with('danger', 'Gagal mengubah Category Products.');
        }
    }
}
