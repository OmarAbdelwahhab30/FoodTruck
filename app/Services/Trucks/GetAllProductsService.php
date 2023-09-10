<?php

namespace App\Services\Trucks;

use App\Models\Product;
use App\Models\Section;


class GetAllProductsService extends \App\Services\Service
{

    public function GetAllProductsInEachTruckByTruckID($request)
    {
        $all = Product::where("truck_id", $request->truck_id)->with("images")->with("sizes",function ($q){
            $q->orderBy("price","ASC");
        })->with("optionals")->get();
        $products = Section::where("truck_id", $request->truck_id)->with("products",function ($q){
            $q->with("images");
            $q->with("sizes",function ($q) {
                $queryOrder = "CASE WHEN size = 'small' THEN 1 ";
                $queryOrder .= "WHEN size = 'medium' THEN 2 ";
                $queryOrder .= "ELSE 3 END";
                $q->orderByRaw($queryOrder, "ASC");
            });
            $q->with("optionals");
        })->get();

        $result = [
            "id" => 0,
            "type" => "all",
            "products" => $all,
        ];

        return $products->prepend($result);

    }
}
