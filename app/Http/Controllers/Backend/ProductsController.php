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
use App\Models\Products\MProducts;
use App\Models\CategoryProducts\MCategoryProducts;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $productList = MProducts::paginate(10);
        return view('backend.master-data.products.products', [
            'productList' => $productList
        ]);
    }

    public function create(Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                if ($request->thumbnail !== null)
                {
                    $pathImage = str_replace('public', 'storage', BackendHelper::validationImageBase64($request->thumbnail, 'products', 720, 960));
                }
                DB::beginTransaction();
                $product                        = new MProducts;
                $product->name                  = $request->name;
                $product->slug                  = Str::slug($request->name);
                $product->category_product_id   = $request->category;
                $product->description           = $request->description;
                $product->price                 = $request->price;
                $product->size                  = $request->size;
                $product->color                 = $request->color;
                $product->thumbnail             = isset($pathImage) ? $pathImage : '-';
                $product->flag_active           = MProducts::ACTIVE; #DEFAULT ACTIVE
                $product->created_by            = Auth::user()->id;
                $product->created_at            = date('Y-m-d H:i:s');
                $product->save();
                DB::commit();
                
                return redirect('panel/master-data/products')->with('success','Sukses membuat Product.');
            }

            $mCategoryProducts = MCategoryProducts::where('flag_active', MCategoryProducts::ACTIVE)->get();
            
            return view('backend.master-data.products.create-products', [
                'mCategoryProducts' => $mCategoryProducts
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/products')->with('danger','Gagal membuat Product.');
        }
    }

    public function update($id, Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                if ($request->thumbnail !== null)
                {
                    $pathImage = str_replace('public', 'storage', BackendHelper::validationImageBase64($request->thumbnail, 'products', 720, 960));
                }
                DB::beginTransaction();
                $product                        = MProducts::find(\Crypt::decryptString($id));
                $product->name                  = $request->name;
                $product->slug                  = Str::slug($request->name);
                $product->category_product_id   = $request->category;
                $product->description           = $request->description;
                $product->price                 = $request->price;
                $product->size                  = $request->size;
                $product->color                 = $request->color;
                if ($request->thumbnail != null)
                {
                    $product->thumbnail         = isset($pathImage) ? $pathImage : '-';
                }
                $product->flag_active           = $request->status;
                $product->updated_by            = Auth::user()->id;
                $product->updated_at            = date('Y-m-d H:i:s');
                $product->save();

                // if ($request->foodphotos != null) {
                //     foreach ($request->foodphotos as $keyPhotos => $valPhotos)
                //     {
                //         $file_path_food = null;
                //         $imgname   = Str::random(15);
                //         $extension = $valPhotos->extension();
                //         $filename  = $imgname .'.'.$extension;
                //         $path      = '/contents/foodphotos/'.Session::get('ss_iduser').'/'.date('Y').'/'.date('m').'/'.date('d');
                //         $fullpath  = $path.'/'.$filename;
                //         $dir_save  = public_path().$fullpath;
                //         $dirname   = dirname($dir_save);
                //         if (!file_exists($dirname)) (mkdir($dirname, 0755, true));
                //         $valPhotos->move(public_path().$path,$filename);
                //         $file_path_food = $fullpath;

                //         $foodPhotos             = new MFoodPhotos;
                //         $foodPhotos->tenants_id = $product->id;
                //         $foodPhotos->food_photo = $file_path_food;
                //         $foodPhotos->created_by = Session::get('ss_iduser');
                //         $foodPhotos->created_at = date("Y-m-d H:i:s");
                //         $foodPhotos->save();
                //     }
                // }

                DB::commit();
                
                return redirect('panel/master-data/products')->with('success', 'Sukses mengubah Product.');
            }
            
            $product = MProducts::where('id', \Crypt::decryptString($id))->first();
            $mCategoryProducts = MCategoryProducts::where('flag_active', MCategoryProducts::ACTIVE)->get();
            
            return view('backend.master-data.products.update-products', [
                'product'           => $product,
                'mCategoryProducts' => $mCategoryProducts
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/products')->with('danger', 'Gagal mengubah Product.');
        }
    }
}
