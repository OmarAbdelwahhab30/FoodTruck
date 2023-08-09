<?php

namespace App\Services\Trucks;

use App\Models\Product;
use App\Models\Section;
use App\Models\Truck;
use Illuminate\Support\Facades\DB;

class GetAllProductsService extends \App\Services\Service
{

    public function GetAllProductsInEachTruckByTruckID($request)
    {
        $all = Product::where("truck_id", $request->truck_id)->with("images")->get();
        $products = Section::where("truck_id", $request->truck_id)->with("products",function ($q){
            $q->with("images");
        })->get();

        $result = [
            "id" => 0,
            "type" => "all",
            "products" => $all,
        ];

        return $products->prepend($result);

    }
}
