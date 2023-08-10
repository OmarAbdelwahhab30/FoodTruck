<?php

namespace App\Services\Products;

use App\Models\Image;
use App\Models\Optional;
use App\Models\Product;
use App\Models\Size;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class AddProductService extends Service
{


    public function exec($request)
    {

        $product_id =  DB::transaction(function () use ($request){

            $product = $this->addProduct($request);
            $this->addProductImages($request->file('images'),$product->id);
            $this->addOptionals($request->optionals,$product->id);
            $this->addSizes($request->sizes,$product->id);
            return $product->id;
        });

        return Product::where("id",$product_id)->with("sizes")->with("optionals")->get();
    }

    public function addProduct($request)
    {
        return Product::create([
            'name'          => $request->name ,
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

    private function addOptionals($optionals,$product_id)
    {

        foreach ($optionals as $optional)
        {
            Optional::create([
               'optional'       => $optional['optional'],
               'price'          => $optional['price'],
               'product_id'     => $product_id,
            ]);
        }
    }

    private function addSizes($sizes,$product_id)
    {
        foreach ($sizes as $size)
        {
            Size::create([
                'size' => $size['size'],
                'price'    => $size['price'],
                'product_id'     => $product_id,
            ]);
        }
    }

}
