<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result = null, $message)
    {
    	$response = [
            'status' => true,
            'message' => $message,
            'data'    => $result,
        ];
        return response()->json($response, 200)->header('Accept', 'application/json');
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = "", $code = 404)
    {
    	$response = [
            'status' => false,
            'message' => $error,
            'error' =>$errorMessages,
        ];

        return response()->json($response, $code);
    }

    public function uploadFile($request,$dir){
        if ($request->has('image')) {    
    
            foreach($request->file('image') as $file){

                $image = $file;

                $fileOrigin = $image->getClientOriginalName();

                $filename = pathinfo($fileOrigin,PATHINFO_FILENAME);

                $extension = $image->getClientOriginalExtension();

                $path_file =$filename.'_'.uniqid().'.'.$extension;

                $url =  trans($dir.$path_file);

                Storage::disk('public')->put($dir.$path_file, file_get_contents($image));

                return trans($url);

            }
        }
    }

    public function uploadFileBanner(Request $request){
        if ($request->has('image')) {    
    
                $image = $request->file('image');

                list($imageWidth, $imageHeight) = getimagesize($image);

                if(!($imageWidth <= 500) && !($imageHeight <=300)){
                    return "Kích thước width height quá lớn";
                }

                $fileOrigin = $image->getClientOriginalName();

                $filename = pathinfo($fileOrigin,PATHINFO_FILENAME);

                $extension = $image->getClientOriginalExtension();

                $path_file =$filename.'_'.uniqid().'.'.$extension;

                $url =  trans("banners/".$path_file);

                Storage::disk('public')->put("banners/".$path_file, file_get_contents($image));

                return trans($url);
        }
    }
}
