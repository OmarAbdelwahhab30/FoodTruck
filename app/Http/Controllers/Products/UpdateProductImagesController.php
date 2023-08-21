<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\ProductImageRequest;
use App\Services\Products\UpdateProductImagesService;
use Illuminate\Support\Facades\Gate;

class UpdateProductImagesController extends Controller
{

    public function deleteProductImageByID(ProductImageRequest $request,UpdateProductImagesService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('update-product')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $deleted  = $service->deleteImageByID($request->image_id);
        if($deleted){
            return $this->returnSuccessMessage(__("responses.Product Image has been deleted successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
