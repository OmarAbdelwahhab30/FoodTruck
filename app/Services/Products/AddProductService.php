<?php

namespace App\Services\Products;

use App\Models\Image;
use App\Models\Product;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class AddProductService extends Service
{


    public function exec($request)
    {

        return DB::transaction(function () use ($request){

            $product = $this->addProduct($request);
            $this->addProductImages($request->file('images'),$product->id);
            return $product;
        });
    }

    public function addProduct($request)
    {
        return Product::create([
            'name'          => $request->name ,
            'price'         => $request->price,
            'calories'      => $request->calories,
            'description'   => $request->description,
            'truck_id'      => auth("sanctum")->user()->truck->id,
            'section_id'  => $request->section_id,
        ]);
    }

    public function addProductImages($images,$product_id)
    {
        foreach ($images as $image) {
            Image::create([
                'image'         => env("APP_URL").":8000/storage/images/products/".$this->UploadFile($image,"images/products"),
                'product_id'    => $product_id,
            ]);
        }
    }

}
