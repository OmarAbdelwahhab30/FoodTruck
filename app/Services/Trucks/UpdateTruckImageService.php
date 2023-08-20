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
                'image'         => $this->UploadFile($image),
                'truck_id'    => $truck_id,
            ]);
        }

    }

    public function deleteImageByID($image_id)
    {
        $image = TruckImage::find($image_id);
        $image->delete();
        $deleted = $this->DeleteFile($image->image);
        if ($deleted){
            return true;
        }
        return false;
    }

}
