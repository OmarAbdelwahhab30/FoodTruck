<?php

namespace App\Http\Controllers\admin\SellerRequests;

use App\Http\Requests\admin\RejectionSellerRequest;
use App\Models\Role;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Throwable;

class SellerRequestsController
{


    public function index()
    {
        $sellers = User::where("accepted", 0)->where("role_id", Role::ROLE_SELLER)->get();
        return view("admin.seller-requests.index", compact("sellers"));
    }

    public function preview($seller_id)
    {
        $truck = Truck::where("user_id", $seller_id)->first();
        return view("admin.seller-requests.preview", compact('truck'));
    }

    public function accept(Request $request)
    {
        $basic = new \Vonage\Client\Credentials\Basic(env("VONAGE_KEY"), env("VONAGE_SECRET"));
        $client = new \Vonage\Client($basic);
        try {
            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($request->phone, "Food-Truck",
                    __("admin.We are pleased to inform you that your application for food truck has been accepted"))
            );
        } catch (Throwable  $exception) {
            return redirect()->to("admin/SellersRequests")
                ->with("error", __("admin.connection was disabled"));
        }

        $message = $response->current();

        if ($message->getStatus() == 0) {
            $user = User::find($request->seller_id);
            $user->accepted = 1;
            if ($user->save()) {
                return redirect()->to(LaravelLocalization::getCurrentLocale()."/admin/SellersRequests")
                    ->with("success", __("admin.The message was sent successfully"));
            }
            return redirect()->to(LaravelLocalization::getCurrentLocale()."/admin/SellersRequests")
                ->with("error", __("admin.Something went wrong try again later"));
        } else {
            return redirect()->to(LaravelLocalization::getCurrentLocale()."/admin/SellersRequests")
                ->with("error", __("admin.Something went wrong try again later"));
        }
    }
    public function reject(RejectionSellerRequest $request)
    {
        $basic = new \Vonage\Client\Credentials\Basic(env("VONAGE_KEY"), env("VONAGE_SECRET"));
        $client = new \Vonage\Client($basic);
        try {
            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($request->phone, "Food-Truck",
                    $request->message . __("admin.Register again please."))
            );
        } catch (Throwable  $exception) {
            return redirect()->to(LaravelLocalization::getCurrentLocale()."/admin/SellersRequests")
                ->with("error", __("admin.connection was disabled"));
        }

        $message = $response->current();
        if ($message->getStatus() == 0) {
            $user = User::find($request->seller_id);
            if ($user->delete()) {
                return redirect()->to(LaravelLocalization::getCurrentLocale()."/admin/SellersRequests")
                    ->with("success", __("admin.The message was sent successfully with rejection message"));
            }
            return redirect()->to(LaravelLocalization::getCurrentLocale()."/admin/SellersRequests")
                ->with("error",__("admin.Something went wrong try again later"));
        } else {
            return redirect()->to(LaravelLocalization::getCurrentLocale()."/admin/SellersRequests")
                ->with("error", __("admin.Something went wrong try again later"));
        }
    }
}
