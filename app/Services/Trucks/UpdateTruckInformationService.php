<?php

namespace App\Services\Trucks;

use App\Models\Truck;
use App\Models\User;
use App\Services\Products\UpdateProductImagesService;
use Illuminate\Support\Arr;

class UpdateTruckInformationService
{
    public function exec($request)
    {
        $truck = $this->updateTruck($request);
        if ($request->file('truck_images') !== null) {
            (new UpdateTruckImageService())->updateTruckImage($request->file("truck_images"), $request->id);
        }
        return $truck;
    }

    public function updateTruck($request)
    {
        return Truck::where("id", $request->id)->update(Arr::except(array_filter($request->all()), 'truck_images'));
    }

    public function ChangeDeliveryStatus()
    {
        $truck = auth("sanctum")->user()->truck;
        $truck_id = $truck->id;
        $current_delivery = $truck->delivery;
        $updated = Truck::where('id',$truck_id)->update([
            'delivery'  =>  !$current_delivery,
        ]);
        if ($updated){
            return response()->json([
                'status'    => 200,
                'delivery'  => !$current_delivery,
                'message'   => __("responses.Truck delivery status has been updated successfully."),
                ]);
        }
        return response()->json([
            'status'    => 500,
            'delivery'  => $current_delivery,
            'message'   => __("responses.Some thing went wrong ,try again later"),
        ]);
    }
}
