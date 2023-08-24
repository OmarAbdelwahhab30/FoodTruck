<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\addProductRequest;
use App\Http\Requests\products\deleteProductRequest;
use App\Models\Product;
use App\Services\Products\AddProductService;
use App\Services\Products\DeleteProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeleteProductController extends Controller
{
    public function deleteProduct(deleteProductRequest $request, DeleteProductService $service)
    {
        if (! Gate::allows('delete-product')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $product = $service->exec($request);
        if($product){
            return $this->returnSuccessMessage("Product has been deleted successfully");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
