<?php

namespace App\Services\Trucks;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Services\Service;
use Illuminate\Http\Request;

class ShowAllTrucksService extends Service
{
    public function GetAllTrucks(): \Illuminate\Database\Eloquent\Collection
    {
        return Truck::all();
    }
}
