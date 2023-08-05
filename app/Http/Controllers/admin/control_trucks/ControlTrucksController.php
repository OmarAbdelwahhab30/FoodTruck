<?php

namespace App\Http\Controllers\admin\control_trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeleteProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
use App\Models\Section;
use App\Models\Truck;
use App\Models\TruckImage;
use App\Models\User;
use Illuminate\Http\Request;

class ControlTrucksController extends Controller
{

    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if (!$request->has("_token")){
            return view("admin.control-trucks.search");
        }else
        {
            $truck = Truck::whereHas('user', function($query) use ($request) {
                $query->where('phone', $request->search);
            })->first();
            $sections = Section::where("truck_id",$truck->id)->get();
            $reviews = Review::where("to",User::where("phone",$request->search)->first()->id)->latest()->take(5)->get();
            $count_reviews = Review::all()->count();
            $truck_images = TruckImage::where("truck_id",$truck->id)->get();
            return view("admin.control-trucks.search")
                ->with("truck",$truck)
                ->with("reviews",$reviews)
                ->with("sections",$sections)
                ->with("reviews_count",$count_reviews)
                ->with("truck_images",$truck_images);
        }
    }

    public function getProducts($section_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products  = Section::where("id",$section_id)->with(["products" => function($q){
                $q->with(["images" => function($qq){
                    $qq->select("image","product_id","id")->get();
                }])->get();
        }])->first();

        //dd($products);
        return view("admin.control-trucks.products")
            ->with("products",$products);
    }

    public function deleteProduct(DeleteProductRequest $request): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($request->product_id);
        if ($product->delete()){
            return redirect()->back()->with("success","Product has been deleted successfully.");
        }
        return redirect()->back()->with("error","SomeThing went wrong ,try again later");

    }

}
