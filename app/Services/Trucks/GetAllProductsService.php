<?php

namespace App\Services\Trucks;

use App\Models\Truck;

class GetAllProductsService extends \App\Services\Service
{

    public function GetAllProductsInEachTruckByTruckID($request)
    {

        return Truck::Where("id",$request->truck_id)->with("products",function ($q) {
               $q->with("images");
        })->get();
    }
}
