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
        //return response()->json($request);
//        if (! Gate::allows('add-product')) {
//            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
//        }


        $product = Product::find($request->product_id);
        foreach ($product->images as $image) {

            unlink(public_path($image));
        }




        $product = $service->exec($request);
        if($product){
            return $this->returnSuccessMessage("Product has been deleted successfully");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
