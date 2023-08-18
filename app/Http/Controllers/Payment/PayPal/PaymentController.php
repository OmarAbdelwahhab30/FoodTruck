<?php

namespace App\Http\Controllers\Payment\PayPal;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

class PaymentController extends Controller
{

    public function index($customer_id,$order_id,$currency,$amount,$seller_id)
    {
        $amount = number_format($amount,2);

        session()->put('customer_id',$customer_id);

        session()->put('order_id',$order_id);

        session()->put('currency',$currency);

        session()->put('amount',$amount);

        session()->put('seller_id',$seller_id);

        session()->put("customer_email",User::find($customer_id)->email);

        return view("payment-view",compact(['customer_id','currency','order_id','amount']));
    }

    /**
     * @throws \Throwable
     */
    public function handlePayment()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment'),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => session()->get("currency"),
                        "value" => session()->get("amount")
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()->route('suc');
        }
    }

    /**
     * @throws Throwable
     */
    public function paymentSuccess(Request $request): \Illuminate\Http\RedirectResponse
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            if ($this->CreatePayment($response) && $this->IncreaseWalletBalance(session()->get("amount"),session()->get("seller_id"))){
                return redirect()->route('suc');
            }
            return redirect()->route('er');
        } else {
            return redirect()->route('er');
        }
    }
    private function CreatePayment($response)
    {
        $payment = Payment::create([
            'payment_status'    => $response['status'],
            'payment_method'    => 'paypal',
            'payment_response'  => json_encode($response),
            'customer_id'       => session()->get("customer_id"),
            'order_id'          => session()->get("order_id") ,
            'payment_id'	    => $response['id'],
            'payer_email'       => session()->get("customer_email"),
            'currency'          => session()->get("currency")
        ]);
        if ($payment){
            return true;
        }
        return false;
    }
    public function SUC()
    {
        return view("suc");
    }

    public function er()
    {
        return view("er");
    }
}
