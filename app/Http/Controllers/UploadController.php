<?php
/**
 * Created by PhpStorm.
 * User: 13566
 * Date: 2017/12/4
 * Time: 21:52
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service\Testservice;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        $file = $request->file('afile');

        if(!$file->isValid())
            return response()->json([]);

        //源文件名
        $originname = $file->getClientOriginalExtension();

        //扩展名
        $ext = $file->getClientOriginalExtension();

        //
        $type = $file->getClientMimeType();

        //
        $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;

        $issuccess = Storage::disk('')->put($filename,file_get_contents($file->getRealPath()));
    }
}