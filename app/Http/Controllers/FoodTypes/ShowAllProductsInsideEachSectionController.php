<?php

namespace App\Http\Controllers\FoodTypes;

use App\Http\Controllers\Controller;
use App\Services\FoodTypes\ShowAllProductsInsideEachSectionService;
use Illuminate\Http\Request;

class ShowAllProductsInsideEachSectionController extends Controller
{
    public function GetAllProductsInsideEachSectionByID(Request $request,ShowAllProductsInsideEachSectionService $service): \Illuminate\Http\JsonResponse
    {
        $products = $service->GetAllProductsInsideEachSectionByID($request);
        if (!empty($products)){
            return $this->returnData("Sections",$products,"Here are All Products inside this Section.");
        }
        return $this->returnError("There is no products to show");
    }
}
