<?php

namespace App\Services\FoodTypes;

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use App\Models\Product;
use App\Services\Service;
use Illuminate\Http\Request;

class ShowAllProductsInsideEachSectionService extends Service
{

    public function GetAllProductsInsideEachSectionByID($request)
    {
        return Product::where("food_type_id",$request->section_id)->where("truck_id",$request->truck_id)
            ->with("images",function ($q){
                $q->select("id","image","product_id");
            })->get();
    }
}
