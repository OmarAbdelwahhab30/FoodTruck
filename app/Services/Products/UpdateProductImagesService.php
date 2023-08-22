<?php

namespace App\Services\Products;

use App\Models\Image;
use App\Models\Product;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class UpdateProductImagesService extends Service
{


    public function updateProductImages($images, $product_id)
    {
        foreach ($images as $image) {
            Image::create([
                'image' => $this->UploadFile($image),
                'product_id' => $product_id,
            ]);
        }
    }

    public function deleteImageByID($Product_Image_ID)
    {
        $image = Image::find($Product_Image_ID);
        $deleted = DB::transaction(function ($q) use ($image) {
            $this->DeleteFile($image);
            return $image->delete();
        });
        if ($deleted) {
            return true;
        }
        return false;
    }


}
