<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\addFoodTypeRequest;
use App\Http\Requests\products\deleteProductRequest;
use App\Http\Requests\products\updateProductRequest;
use App\Services\Products\UpdateProductImagesService;
use App\Services\Products\UpdateProductService;
use Illuminate\Http\Request;

class UpdateProductImagesController extends Controller
{

    public function deleteProductImageByID(deleteProductRequest $request,UpdateProductImagesService $service): \Illuminate\Http\JsonResponse
    {
        $deleted  = $service->deleteImageByID($request->image_id);
        if($deleted){
            return $this->returnSuccessMessage("Product Image has been deleted successfully");
        }
        return $this->returnError("some thing went wrong");
    }
}
