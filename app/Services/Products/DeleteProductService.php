<?php

namespace App\Services\Products;

use App\Models\Image;
use App\Models\Optional;
use App\Models\Product;
use App\Models\Size;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class DeleteProductService extends Service
{
    public function exec($request)
    {
        $product = Product::find($request->product_id);
        if($product->delete()){
            $this->unlinkProductImages($product->images);
            return true;
        }
        return false;
    }
    public function unlinkProductImages($images)
    {
        foreach ($images as $image) {
            $this->DeleteFile($image['image']);
        }
    }

}
