<?php

namespace App\Http\Controllers\Payment\PayPal;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;


class PaymentController extends Controller
{

    public function payment(Request $request)
    {

        session()->put('customer_id', auth("sanctum")->user()->id);
        session()->put('order_id', $request->order_id);


        $customer = User::find(auth("sanctum")->user()->id);

        $order = Order::where(['id' => $request->order_id, 'user_id' => auth("sanctum")->user()->id])->first();


            $data = [
                'name'  => $customer->name,
                'email' => $customer->email !== null? $customer->email : "no email found" ,
                'phone' => $customer->phone,
            ];
            session()->put('data', $data);
            return view('payment-view');
    }

    public function success(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $order = Order::where(['id' => session('order_id'), 'user_id'=>session('customer_id')])->first();
        /*if ($order->callback != null) {
            return redirect($order->callback . '&status=success');
        }
        return response()->json(['message' => 'Payment succeeded'], 200); */
        return redirect('&status=success');
    }

    public function fail()
    {
        $order = Order::where(['id' => session('order_id'), 'user_id'=>session('customer_id')])->first();
        /*if ($order->callback != null) {
            return redirect($order->callback . '&status=fail');
        }
        return response()->json(['message' => 'Payment failed'], 403);*/
        return redirect('&status=success');
    }
}
