<?php

namespace App\Helpers;

use Str;
use Image;
use Storage;
use Exception;

use App\Mail\PHPMailer;
use App\Mail\phpmailerException;

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

    public static function sendEmail($request)
    {
        // $request->session()->put('product', $request->product);
        // $request->session()->put('qty', $request->qty);
        // dd($request->session()->get('nama'));
        // dd($request->all());

        $elementProduct = "";
        foreach ($request->product as $keyProduct => $valProduct)
        {
            $product = \DB::table('m_product')->where('id', $valProduct)->first();
            $elementProduct .= "
                <tr>
                    <td>{$product->name}</td>
                    <td>{$request->qty[$keyProduct]}</td>
                    <td>{$product->price}</td>
                </tr>
            ";
        }

        $body           = file_get_contents(resource_path('views\frontend\email\checkout.blade.php'));
        $bodyContent    = str_replace("#PRODUCTLIST#", $elementProduct, $body);
        // $body = str_replace("(BODYTEXT)", $bodyText, $body);

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.hostinger.co.id';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@tokodean.com';
        $mail->Password = 'TokoDean@2021';
        $mail->Port = 587;
        $mail->setFrom('no-reply@tokodean.com', 'Toko Dean');
        $mail->addAddress("agussuandi48@gmail.com", "agussuandi48@gmail.com");
        $mail->isHTML(true);

        $mail->Subject = "Dapatkan Judi!";
        $mail->Body = $bodyContent;

        if(!$mail->send()) {
            // dd('tidak terkirim');
            die();
        }
        else {
            dd('terkirim');
        }
    
        // if(!$mail->send())
        // {
        //     $logEmail               = new TransLogEmail;
        //     $logEmail->no_ticket    = $dataArray['noTicket'];
        //     $logEmail->nama         = $sendKontak;
        //     $logEmail->email        = $sendMail;
        //     $logEmail->status       = 'Tidak Terkirim';
        //     $logEmail->created_at   = date('Y-m-d H:i:s');
        //     $logEmail->save();

        //     return "GAGAL";
        // }
        // else
        // {
        //     $logEmail               = new TransLogEmail;
        //     $logEmail->no_ticket    = $dataArray['noTicket'];
        //     $logEmail->nama         = $sendKontak;
        //     $logEmail->email        = $sendMail;
        //     $logEmail->status       = 'Terkirim';
        //     $logEmail->created_at   = date('Y-m-d H:i:s');
        //     $logEmail->save();

        //     return "BERHASIL";
        // }
    }
}