<?php

namespace App\Services\Sections;

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use App\Models\Section;
use Illuminate\Http\Request;

class AddSectionService extends Controller
{

    public function addSection($request)
    {
        return Section::create([
            'type'  =>  $request->type,
            'truck_id'  => auth("sanctum")->user()->truck->id
        ]);
    }
}
