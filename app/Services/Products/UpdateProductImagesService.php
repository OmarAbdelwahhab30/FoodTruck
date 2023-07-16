<?php

namespace App\Services\Products;

use App\Models\Image;
use App\Models\Product;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class UpdateProductImagesService extends Service
{


    public function updateProductImages($images,$product_id)
    {
        foreach ($images as $image) {
            Image::create([
                'image'         => env("APP_URL").":8000/storage/images/products/".$this->UploadFile($image,"images/products"),
                'product_id'    => $product_id,
            ]);
        }
    }

    public function deleteImageByID($Product_Image_ID)
    {
        $image = Image::find($Product_Image_ID);
        if($image->delete()){
        $image_name = str_ireplace("http://localhost:8000/storage/images/products/","",$image->image);
        $deleted = $this->DeleteFile($image_name,"/Images/products/");
        if ($deleted){
            return true;
        }
            return false;
        }
        return false;
    }

}
