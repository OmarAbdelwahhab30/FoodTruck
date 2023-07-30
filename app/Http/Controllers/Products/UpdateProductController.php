<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\updateProductRequest;
use App\Services\Products\UpdateProductService;
use Illuminate\Support\Facades\Gate;

class UpdateProductController extends Controller
{
    public function updateProduct(updateProductRequest $request, UpdateProductService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('update-product')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $product = $service->exec($request);
        if($product){
            return $this->returnData(__("Product"),$product,__("responses.Product has been updated successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }


}
