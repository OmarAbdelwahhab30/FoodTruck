<?php

namespace App\Services\FoodTypes;

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use Illuminate\Http\Request;

class UpdateFoodTypeService extends Controller
{

    public function updateFoodType($request)
    {
        return FoodType::where("id",$request->id)->update(array_filter($request->all()));
    }
}
