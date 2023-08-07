<?php

namespace App\Http\Controllers\admin\SellerRequests;

use App\Http\Requests\admin\RejectionSellerRequest;
use App\Models\Role;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;
use Vonage\Client\Exception\Exception;

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
                    'We are pleased to inform you that your application for food truck has been accepted.')
            );
        } catch (Throwable  $exception) {
            return redirect()->to("admin/SellersRequests")->with("error", "connection was disabled.");
        }

        $message = $response->current();

        if ($message->getStatus() == 0) {
            $user = User::find($request->seller_id);
            $user->accepted = 1;
            if ($user->save()) {
                return redirect()->to("admin/SellersRequests")->with("success", "The message was sent successfully\n");
            }
            return redirect()->to("admin/SellersRequests")->with("error", "something went wrong !");
        } else {
            return redirect()->to("admin/SellersRequests")->with("error", "The message failed with status: " . $message->getStatus() . "\n");

        }
    }


    public function reject(RejectionSellerRequest $request)
    {
        $basic = new \Vonage\Client\Credentials\Basic(env("VONAGE_KEY"), env("VONAGE_SECRET"));
        $client = new \Vonage\Client($basic);
        try {
            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($request->phone, "Food-Truck",
                    $request->message . " Register again please.")
            );
        } catch (Throwable  $exception) {
            return redirect()->to("admin/SellersRequests")->with("error", "connection was disabled.");
        }

        $message = $response->current();
        if ($message->getStatus() == 0) {
            $user = User::find($request->seller_id);
            if ($user->delete()) {
                return redirect()->to("admin/SellersRequests")->with("success", "The message was sent successfully with rejection message.\n");
            }
            return redirect()->to("admin/SellersRequests")->with("error", "something went wrong !");
        } else {
            return redirect()->to("admin/SellersRequests")->with("error", "The message failed with status: " . $message->getStatus() . "\n");
        }
    }
}
