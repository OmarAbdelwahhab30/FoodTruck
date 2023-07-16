<?php

namespace App\Services\Products;

use App\Models\Image;
use App\Models\Product;
use App\Services\Service;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateProductService extends Service
{

    public function exec($request)
    {
        $product = $this->updateProduct($request);
        if (isset($request->images) && count($request->images) >0){
            (new UpdateProductImagesService())->updateProductImages($request->file("images"),$request->id);
        }
        return $product;
    }

    public function updateProduct($request)
    {
        return Product::where("id",$request->id)->update(Arr::except($request->validated(), 'images'));
    }


}
