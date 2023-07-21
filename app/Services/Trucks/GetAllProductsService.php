<?php

namespace App\Services\Trucks;

use App\Models\Truck;

class GetAllProductsService extends \App\Services\Service
{

    public function GetAllProductsInEachTruckByTruckID($request)
    {

        return Truck::find($request->truck_id)->products;
    }
}
