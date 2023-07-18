<?php

namespace App\Services\Trucks;

use App\Models\Image;
use App\Models\Product;
use App\Models\Truck;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class UpdateTruckImageService extends Service
{

    public function updateTruckImage($image,$truck_id)
    {
        Truck::where("id",$truck_id)->update([
            'image'         => env("APP_URL").":8000/storage/images/trucks/".
                $this->UploadFile($image,"images/trucks"),
        ]);
    }

    public function deleteImageByID($Truck_ID)
    {
        $truck = Truck::find($Truck_ID);
        $image_name = str_ireplace("http://localhost:8000/storage/images/trucks/","",$truck->image);
        $deleted = $this->DeleteFile($image_name,"/Images/trucks/");
        if ($deleted){
            return true;
        }
        return false;
    }

}
