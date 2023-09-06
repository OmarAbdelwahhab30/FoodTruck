<?php

namespace App\Services\Products;

use App\Http\Requests\products\deleteProductOptionalRequest;
use App\Http\Requests\products\deleteProductSizeRequest;
use App\Models\Image;
use App\Models\Optional;
use App\Models\Product;
use App\Models\Size;
use App\Services\Service;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateProductService extends Service
{

    public function exec($request)
    {
        $product = $this->updateProduct($request);
        $this->updateProductSizes($request->sizes);
        if (isset($request->images) && count($request->images) > 0) {
            (new UpdateProductImagesService())->updateProductImages($request->file("images"), $request->id);
        }
        return $product;
    }

    private function updateProduct($request)
    {
        return Product::where("id", $request->id)->update(Arr::except($request->validated(), ['images','sizes']));
    }

    private function updateProductSizes($sizes)
    {
        foreach ($sizes as $s)
        {
            $size = Size::find($s['id']);
            $size->size = $s['size'];
            $size->price = $s['price'];
            $size->save();
        }
    }

    public function deleteProductOptionalByOptionalID($request)
    {
        $optional = Optional::find($request->optional_id);
        if ($optional->delete())
        {
            return true;
        }
        return false;
    }

    public function deleteProductSizeBySizeID($request)
    {
        $size = Size::find($request->size_id);
        if ($size->delete()) {
            return true;
        }
        return false;
    }

    public function addOptional($request)
    {
        $created = Optional::create([
            'optional' => $request->optional,
            'price' => $request->price,
            'product_id' => $request->product_id,
        ]);
        if ($created){
            return true;
        }
        return false;
    }

    public function editOptional($request)
    {
        $optional = Optional::find($request->optional_id);
        $optional->optional = $request->optional;
        $optional->price  = $request->price;
        if($optional->save())
        {
            return true;
        }
        return false;
    }

}
