<?php

namespace App\Http\Controllers\admin\cashout;

use App\Http\Controllers\Controller;
use App\Models\Request;
use App\Models\Wallet;

class CashoutController extends Controller
{


    public function index()
    {
        return view("admin.cashout.index");
    }

    public function elements($status)
    {
        $elements = Request::where("status",$status)->get();
        return view("admin.cashout.elements",compact('elements'));
    }

    public function preview($element_id)
    {
        $element = Request::find($element_id);
        return view("admin.cashout.pending",compact('element'));
    }

    public function accept($request_id,$amount)
    {
        $request = Request::find($request_id);
        $request->status = "accepted";
        $balance = $request->wallet->balance ;
        $balance = $balance - $amount;
        Wallet::where("user_id",$request->user->id)->update([
            'balance'    => $balance,
        ]);
        if ($request->save())
        {
            return redirect()->route("admin.cash.index")->with("success", "The request is accepted successfully.");
        }
        return redirect()->route("admin.cash.index")->with("fail", "something went wrong !");
    }

    public function decline($request_id)
    {
        $request = Request::find($request_id);
        $request->status = "declined";
        $request->save();
        return redirect()->route("admin.cash.index")->with("success","The request is declined successfully.");
    }

    public function acceptIndex(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $accepted = Request::where("status","accepted")->paginate(10);
        return view("admin.cashout.accepted",compact("accepted"));
    }

    public function deleteRequest($requestID)
    {
        $request = Request::find($requestID);
        if ($request->delete()) {
            return redirect()->back()->with("success", "Request has been deleted successfully.");
        }
        return redirect()->back()->with("fail", "something went wrong !");

    }

    public function returnRequest($request_id,$amount)
    {
        $request = Request::find($request_id);
        $request->status = "pending";
        $balance = $request->wallet->balance ;
        $balance = $balance + $amount;
        Wallet::where("user_id",$request->user->id)->update([
            'balance'    => $balance,
        ]);
        if ($request->save())
        {
            return redirect()->back()->with("success", "The request is returned successfully.");
        }
        return redirect()->back()->with("fail", "something went wrong !");
    }

    public function declineIndex()
    {
        $declined = Request::where("status","declined")->paginate(10);
        return view("admin.cashout.declined",compact("declined"));
    }
}
