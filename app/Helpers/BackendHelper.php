<?php

namespace App\Helpers;

use Str;
use Image;
use Storage;
use Exception;

use App\Helpers\JWTAuth;
use App\Models\API\Log\TransLogApi;
use App\Models\API\Auth\JwtPrivateKeys;
use App\Models\API\ResponseAPI\ResponseAPI;

class BackendHelper
{
    private static function validasiExtensionImage($file)
    {
        $data = explode(";", $file);
        $originalExtension = explode("/", $data[0]);
        if ($originalExtension[1] == 'jpeg' || $originalExtension[1] == 'png' || $originalExtension == 'jpg')
        {
            return $originalExtension[1];
        }
        else
        {
            $response = array(
                'response'  => 500,
                'status'    => false,
                'message'   => 'Extension Photo is Invalid.',
            );
        
            header('Content-Type: application/json');
            die(json_encode($response));
        }
    }

    public static function validationImageBase64($photo, $subPath, $length, $height)
    {
        $uniqueChar     = Str::random(20);
        $image          = substr($photo, strpos($photo, ',') + 1);
        $image          = Image::make(base64_decode($image))->resize($length, $height)->stream(self::validasiExtensionImage($photo), 100);
        $fileName       = $uniqueChar.'.'.self::validasiExtensionImage($photo);
        $pathFile       = 'public/'.$subPath;
        Storage::put($pathFile.'/'.$fileName, $image);

        return $pathFile.'/'.$fileName;
    }

    public static function deleteFile($path)
    {
        dd($path);
        unlink(storage_path('app\public\banner\6lCuN19vzJUn2lfz3AvB.jpeg'));
    }
}