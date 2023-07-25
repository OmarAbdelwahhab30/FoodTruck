<?php

namespace App\Services\Sections;

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use App\Models\Section;
use Illuminate\Http\Request;

class UpdateSectionService extends Controller
{

    public function updateSection($request)
    {
        return Section::where("id",$request->id)->update(array_filter($request->all()));
    }
}
