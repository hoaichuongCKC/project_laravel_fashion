<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Banner;
use Illuminate\Http\Request;
class BannerController extends BaseController
{
    public function fetchBanner (Request $request){
        $banners =  Banner::with('image')->get();

        return $this->sendResponse($banners,"fetch banner successfully");
    }
}
