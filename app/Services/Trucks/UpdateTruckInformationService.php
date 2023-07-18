<?php

namespace App\Services\Trucks;

use App\Models\Truck;
use App\Services\Products\UpdateProductImagesService;
use Illuminate\Support\Arr;

class UpdateTruckInformationService
{
    public function exec($request)
    {
        $product = $this->updateTruck($request);
        if ($request->file('image') !== null ){
            (new UpdateTruckImageService())->updateTruckImage($request->file("image"),$request->id);
        }
        return $product;
    }

    public function updateTruck($request)
    {
        return Truck::where("id",$request->id)->update(Arr::except(array_filter($request->all()), 'image'));
    }
}
