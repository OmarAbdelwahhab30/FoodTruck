<?php

namespace App\Services\Trucks;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Models\User;
use App\Services\Service;
use Illuminate\Http\Request;

class ShowDetailsOfEachTruckService extends Service
{
    public function GetTruckDetailsByID($truck_id)
    {
        return Truck::where("id",$truck_id)->with("images")->get();
    }

    public function GetTruckDetailsBySellerID($seller_id)
    {
        return Truck::where("user_id",$seller_id)->get();
    }
}
