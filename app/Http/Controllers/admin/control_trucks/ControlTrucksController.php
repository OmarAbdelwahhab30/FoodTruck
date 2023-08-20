<?php

namespace App\Http\Controllers\admin\control_trucks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeleteProductRequest;
use App\Http\Requests\Admin\SearchTruckRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Section;
use App\Models\Truck;
use App\Models\TruckImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControlTrucksController extends Controller
{

    public function index()
    {
        return view("admin.control-trucks.search");
    }

    public function display_truck(SearchTruckRequest $request)
    {
        $truck = Truck::whereHas('user', function ($query) use ($request) {
            $query->where('phone', $request->search);
        })->first();
        if ($truck != null) {
            $sections = Section::where("truck_id", $truck->id)->get();
            $reviews = Review::where("to", User::where("phone", $request->search)->first()->id)->latest()->take(5)->get();
            $count_reviews = Review::all()->count();
            $truck_images = TruckImage::where("truck_id", $truck->id)->get();
            return view("admin.control-trucks.display-truck")
                ->with("truck", $truck)
                ->with("reviews", $reviews)
                ->with("sections", $sections)
                ->with("reviews_count", $count_reviews)
                ->with("truck_images", $truck_images);
        }else{
            return redirect()->back()->with("error",__("admin.The phone is invalid"));
        }
    }

    public function getProducts($section_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products  = Section::where("id",$section_id)->with(["products" => function($q){
            $q->with(["images" => function($qq){
                $qq->select("image","product_id","id")->get();
            }])->get();
        }])->first();
        return view("admin.control-trucks.products")
            ->with("products",$products);
    }

    public function deleteProduct(DeleteProductRequest $request): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($request->product_id);
        if ($product->delete()){
            return redirect()->back()->with("success",__("admin.Product has been deleted successfully"));
        }
        return redirect()->back()->with("error", __("admin.Something went wrong try again later"));

    }

    public function orders($truck_id)
    {
        return view("admin.control-trucks.orders")->with("truck_id",$truck_id);
    }

    public function getTruckOrders(Request $request)
    {
        $orders  = Order::where("truck_id",$request->truck_id)
            ->whereDate(DB::raw('DATE(created_at)'),'=',date_create($request->date))->get();
        Session::put("orders",$orders);
        Session::put("truck_id",$request->truck_id);
        Session::put("date",$request->date);
        return view("admin.control-trucks.display-orders")
            ->with("orders",$orders)
            ->with("truck_id",$request->truck_id)
            ->with("date",$request->date);
    }

    public function display_orders()
    {
        return view("admin.control-trucks.display-orders");
    }

    public function deleteOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        if ($order->delete())
        {
            return redirect()->back()
                ->with("success",__("admin.order has been deleted successfully"));
        }
        return redirect()->back()
            ->with("error", __("admin.Something went wrong try again later"));
    }
}
