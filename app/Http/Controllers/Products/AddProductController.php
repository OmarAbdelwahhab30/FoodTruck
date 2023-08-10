<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\addProductRequest;
use App\Services\Products\AddProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AddProductController extends Controller
{
    public function addProduct(addProductRequest $request, AddProductService $service): \Illuminate\Http\JsonResponse
    {
        //return response()->json($request);
        if (! Gate::allows('add-product')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $product = $service->exec($request);
        if($product){
            return $this->returnData(__("Product"),$product,__("responses.Product has been added successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
