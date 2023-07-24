<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\addFoodTypeRequest;
use App\Http\Requests\products\deleteProductRequest;
use App\Http\Requests\products\updateProductRequest;
use App\Services\Products\UpdateProductImagesService;
use App\Services\Products\UpdateProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UpdateProductController extends Controller
{
    public function updateProduct(updateProductRequest $request, UpdateProductService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('update-product')) {
            return $this->notAuthorized("You don't have the authorization on this action.");
        }
        $product = $service->exec($request);
        if($product){
            return $this->returnData("Product",$product,"Product has been added successfully");
        }
        return $this->returnError("some thing went wrong");
    }


}
