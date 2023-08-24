<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\ShowSectionProductsRequest;
use App\Services\Sections\ShowAllProductsInsideEachSectionService;
use Illuminate\Support\Facades\Gate;

class ShowAllProductsInsideEachSectionController extends Controller
{
    public function GetAllProductsInsideEachSectionByID(ShowSectionProductsRequest $request,ShowAllProductsInsideEachSectionService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("get-sections-products")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $products = $service->GetAllProductsInsideEachSectionByID($request);
        if (!empty($products)){
            return $this->returnData("Products",$products,__("responses.Here are All Products inside this Section."));
        }
        return $this->returnError(__("responses.There is no products to show"));
    }
}
