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

use App\Models\MasterData\Banner\MBanner;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $bannerList = MBanner::paginate(10);
        return view('backend.master-data.banner.banner', [
            'bannerList' => $bannerList
        ]);
    }

    public function create(Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                if ($request->image == null)
                {
                    return redirect()->back()->with('danger', 'Image banner tidak boleh kosong.');
                }
                DB::beginTransaction();
                $banner               = new MBanner;
                $banner->name         = $request->name;
                $banner->image        = str_replace('public', 'storage', BackendHelper::validationImageBase64($request->image, 'banner', 1920, 570));
                $banner->flag_active  = MBanner::ACTIVE; #DEFAULT ACTIVE
                $banner->created_by   = Auth::user()->id;
                $banner->created_at   = date('Y-m-d H:i:s');
                $banner->save();
                DB::commit();
                
                return redirect('panel/master-data/banner')->with('success', 'Sukses membuat Banner.');
            }

            return view('backend.master-data.banner.create-banner');
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/banner')->with('danger', 'Gagal membuat Banner.');
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                if ($request->image == null)
                {
                    return redirect()->back()->with('danger', 'Image banner tidak boleh kosong.');
                }

                DB::beginTransaction();
                $banner               = MBanner::find(\Crypt::decryptString($id));
                $banner->name         = $request->name;
                $banner->image        = str_replace('public', 'storage', BackendHelper::validationImageBase64($request->image, 'banner', 1920, 570));
                $banner->flag_active  = $request->status;
                $banner->updated_by   = Auth::user()->id;
                $banner->updated_at   = date('Y-m-d H:i:s');
                $banner->save();
                DB::commit();
                
                return redirect('panel/master-data/banner')->with('success', 'Sukses mengubah Banner.');
            }
            
            $banner = MBanner::where('id', \Crypt::decryptString($id))->first();
            
            return view('backend.master-data.banner.update-banner', [
                'banner' => $banner
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('panel/master-data/banner')->with('danger', 'Gagal mengubah Banner.');
        }
    }
}
