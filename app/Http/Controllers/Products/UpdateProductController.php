<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\addOptionalRequest;
use App\Http\Requests\products\deleteProductOptionalRequest;
use App\Http\Requests\products\deleteProductSizeRequest;
use App\Http\Requests\products\editOptionalRequest;
use App\Http\Requests\products\updateProductRequest;
use App\Models\Optional;
use App\Services\Products\UpdateProductService;
use Illuminate\Http\Request;
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
            return $this->returnSuccessMessage(__("responses.Product has been updated successfully"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function deleteProductOptionalByOptionalID(deleteProductOptionalRequest $request, UpdateProductService $service)
    {
        if (! Gate::allows('update-product')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $deleted = $service->deleteProductOptionalByOptionalID($request);
        if($deleted){
            return $this->returnSuccessMessage("Product optional has been deleted successfully");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function deleteProductSizeBySizeID(deleteProductSizeRequest $request, UpdateProductService $service)
    {
        if (! Gate::allows('update-product')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $deleted = $service->deleteProductSizeBySizeID($request);
        if($deleted){
            return $this->returnSuccessMessage("Product size has been deleted successfully");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function addOptional(addOptionalRequest $request,UpdateProductService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('update-product')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $deleted = $service->addOptional($request);
        if($deleted){
            return $this->returnSuccessMessage("Product optional has been added successfully");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    public function editOptional(editOptionalRequest $request,UpdateProductService $service): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('update-product')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $deleted = $service->editOptional($request);
        if($deleted){
            return $this->returnSuccessMessage("Product optional has been updated successfully");
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
