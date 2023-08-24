<?php

namespace App\Http\Controllers\Trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trucks\TruckProductsRequest;
use App\Services\Trucks\GetAllProductsService;
use Illuminate\Support\Facades\Gate;

class GetAllProductsController extends Controller
{

    public function GetAllProductsInEachTruckByTruckID(TruckProductsRequest $request, GetAllProductsService $service): \Illuminate\Http\JsonResponse
    {
        if (!Gate::allows("get-truck-products")){
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
       $products =  $service->GetAllProductsInEachTruckByTruckID($request);
        if ($products)
        {
            return $this->returnData("All Products",$products,__("responses.Here are all products"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));    }
}
