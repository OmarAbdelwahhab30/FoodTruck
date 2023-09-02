<?php

namespace App\Http\Controllers\Payment\PayPal;

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\Paypal\EnterPayPalResponseRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;


class EnterPayPalResponseController extends Controller
{

    public function EnterResponse(EnterPayPalResponseRequest $request)
    {


       $created =  Payment::create([
            'payment_status' =>$request->payment_status ,
            'payment_method' => 'Paypal',
            'payment_response' =>$request->payment_response ,
            'customer_id' => $request->customer_id,
            'order_id' => $request->order_id,
            'payment_id' =>$request->payment_id,
            'payer_email' => $request->payer_email,
            'currency' => $request->currency,
            'seller_id' =>$request->seller_id,
        ]);

       if ($created){
           $this->UpdateOrderWithPaymentID($created->id,$request->order_id);
            $amount_in_Riyal = \AmrShawky\Currency::convert()
               ->from('USD')
               ->to('SAR')
               ->amount($request->amount)
               ->get();
           $this->IncreaseWalletBalance($amount_in_Riyal, $request->seller_id);
           return $this->returnSuccessMessage(__("responses.Payment is done successfully."));
       }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    private function UpdateOrderWithPaymentID($payment_id, $order_id)
    {
        $order = Order::find($order_id);
        $order->payment_id = $payment_id;
        $order->save();
    }
}
