<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trucks\TruckProductsRequest;
use App\Services\Trucks\GetAllProductsService;
use Illuminate\Http\Request;

class GetAllProductsController extends Controller
{

    public function GetAllProductsInEachTruckByTruckID(TruckProductsRequest $request, GetAllProductsService $service): \Illuminate\Http\JsonResponse
    {
       $products =  $service->GetAllProductsInEachTruckByTruckID($request);
        if ($products)
        {
            return $this->returnData("All Products",$products,"Here Are All Products");
        }
        return $this->returnError("Something Went Wrong ,Try again later.");
    }
}
