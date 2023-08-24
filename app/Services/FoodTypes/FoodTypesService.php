<?php

namespace App\Services\FoodTypes;

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use Illuminate\Http\Request;

class FoodTypesService extends Controller
{
    public function GetAllFoodTypes(): \Illuminate\Database\Eloquent\Collection
    {
        return FoodType::select("id","name_".app()->getLocale())->get();
    }
}
