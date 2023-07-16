<?php

namespace App\Services\FoodTypes;

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use Illuminate\Http\Request;

class AddFoodTypeService extends Controller
{

    public function addFoodType($request)
    {
        return FoodType::create([
            'type'  =>  $request->type,
            'truck_id'  => auth("sanctum")->user()->truck->id
        ]);
    }
}
