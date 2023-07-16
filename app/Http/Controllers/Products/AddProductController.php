<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\addProductRequest;
use App\Services\Products\AddProductService;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AddProductController extends Controller
{
    public function addProduct(addProductRequest $request,AddProductService $service)
    {
        $product = $service->exec($request);
        if($product){
            return $this->returnData("Product",$product,"Product has been added successfully");
        }
        return $this->returnError("some thing went wrong");
    }
}
