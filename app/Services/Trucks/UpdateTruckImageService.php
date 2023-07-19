<?php

namespace App\Services\Trucks;

use App\Models\Image;
use App\Models\Product;
use App\Models\Truck;
use App\Models\TruckImage;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class UpdateTruckImageService extends Service
{

    public function updateTruckImage($images,$truck_id)
    {

        foreach ($images as $image) {
            TruckImage::create([
                'image'         => env("APP_URL").":8000/storage/images/trucks/".
                    $this->UploadFile($image,"images/trucks"),
                'truck_id'    => $truck_id,
            ]);
        }

    }

    public function deleteImageByID($image_id)
    {
        $image = TruckImage::find($image_id);
        $image->delete();
        $image_name = str_ireplace("http://localhost:8000/storage/images/trucks/","",$image->image);
        $deleted = $this->DeleteFile($image_name,"/Images/trucks/");
        if ($deleted){
            return true;
        }
        return false;
    }

}
