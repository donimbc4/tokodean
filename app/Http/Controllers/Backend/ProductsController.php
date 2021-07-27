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
use App\Models\Products\MProductsPhoto;
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

                if ($request->productPhoto != null)
                {
                    foreach ($request->productPhoto as $keyPhotos => $valPhotos)
                    {
                        $file_path_food = null;
                        $imgName   = Str::random(20);
                        $extension = $valPhotos->extension();
                        $fileName  = $imgName .'.'.$extension;
                        $pathFile  = 'public/products/'.$product->id;
                        $pathFileFull = Storage::put($pathFile, $valPhotos);
                        
                        $productPhoto               = new MProductsPhoto;
                        $productPhoto->product_id   = $product->id;
                        $productPhoto->photo        = str_replace('public', 'storage', $pathFileFull);
                        $productPhoto->flag_active  = MProductsPhoto::ACTIVE;
                        $productPhoto->created_by   = Auth::user()->id;
                        $productPhoto->created_at   = date("Y-m-d H:i:s");
                        $productPhoto->save();
                    }
                }
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
            dd($e->getMessage());
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

                if ($request->productPhoto != null)
                {
                    foreach ($request->productPhoto as $keyPhotos => $valPhotos)
                    {
                        $file_path_food = null;
                        $imgName   = Str::random(20);
                        $extension = $valPhotos->extension();
                        $fileName  = $imgName .'.'.$extension;
                        $pathFile  = 'public/products/'.$product->id;
                        $pathFileFull = Storage::put($pathFile, $valPhotos);
                        
                        $productPhoto               = new MProductsPhoto;
                        $productPhoto->product_id   = $product->id;
                        $productPhoto->photo        = str_replace('public', 'storage', $pathFileFull);
                        $productPhoto->flag_active  = MProductsPhoto::ACTIVE;
                        $productPhoto->created_by   = Auth::user()->id;
                        $productPhoto->created_at   = date("Y-m-d H:i:s");
                        $productPhoto->save();
                    }
                }

                DB::commit();
                
                return redirect('panel/master-data/products')->with('success', 'Sukses mengubah Product.');
            }
            
            $product = MProducts::where('id', \Crypt::decryptString($id))->first();
            $productPhoto = MProductsPhoto::where('product_id', \Crypt::decryptString($id))->get();
            $mCategoryProducts = MCategoryProducts::where('flag_active', MCategoryProducts::ACTIVE)->get();
            
            return view('backend.master-data.products.update-products', [
                'product'           => $product,
                'productPhoto'      => $productPhoto,
                'mCategoryProducts' => $mCategoryProducts
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/products')->with('danger', 'Gagal mengubah Product.');
        }
    }

    public function deletePhoto(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $productPhoto = MProductsPhoto::find($request->id);
            $productPhoto->delete();
            DB::commit();
            if(\File::exists(public_path($productPhoto->photo))) {
                \File::delete(public_path($productPhoto->photo));
            }

            return redirect()->back()->with('success', 'Delete Successfully');
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
