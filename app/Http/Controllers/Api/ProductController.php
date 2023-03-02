<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;

class ProductController extends BaseController
{
    public function fetchAll(Request $request){   
        try {     
            $products = Product::with(['category','productDetail.image'])->get();
                $products->map(function ($product) {
                    $product->product_details = $product->productDetail->map(function ($detail) {
                        return [
                            "image" =>[
                                'url' => $detail->image->url,
                                'id' => $detail->image->id,
                            ]
                        ];
                    });
                    return $product;
                });
            return $this->sendResponse($products, "Fetch Product successfully!!!");
            
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
