<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function fetchCategories(Request $request){   
        try {     
            $categories = Category::with('image')->get();
            return $this->sendResponse($categories, "Fetch categories successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
