<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Http\Requests\food_types\ShowSectionProductsRequest;
use App\Services\FoodTypes\ShowAllProductsInsideEachSectionService;
use Illuminate\Http\Request;

class ShowAllProductsInsideEachSectionController extends Controller
{
    public function GetAllProductsInsideEachSectionByID(ShowSectionProductsRequest $request,ShowAllProductsInsideEachSectionService $service): \Illuminate\Http\JsonResponse
    {
        $products = $service->GetAllProductsInsideEachSectionByID($request);
        if (!empty($products)){
            return $this->returnData("Products",$products,"Here are All Products inside this Section.");
        }
        return $this->returnError("There is no products to show");
    }
}
