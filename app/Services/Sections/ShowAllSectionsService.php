<?php

namespace App\Services\Sections;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Http\Request;

class ShowAllSectionsService extends Controller
{

    public function GetAllSectionInsideEachTruckByID($request)
    {
        return Truck::find($request->truck_id)->sections;
    }
}
