<?php

namespace App\Http\Controllers\Payment\PayPal;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PaymentController extends Controller
{

    public function index($customer_id,$order_id,$currency,$amount)
    {
        $amount = number_format($amount,2);
        return view("payment-view",compact(['customer_id','currency','order_id','amount']));
    }

    /**
     * @throws \Throwable
     */
    public function handlePayment($customer_id,$order_id,$currency,$amount)
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
                        "currency_code" => $currency,
                        "value" => $amount
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
            dd($response);
            Payment::create([
                'payment_status'    => 'success',
                'payment_method'    => 'paypal',
                'payment_response'  => null,
                'customer_id'       => $customer_id,
                'order_id'          => $order_id ,
                'payment_id'	    => null,
                'payer_email'       => null,
                'currency'          => $currency

            ]);
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment',[$customer_id,$order_id,$currency,$amount])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        return redirect()
            ->route('create.payment')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    /**
     * @throws \Throwable
     */
    public function paymentSuccess(Request $request,$customer_id,$order_id,$currency,$amount)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('create.payment',[$customer_id,$order_id,$currency,$amount])
                ->with('response', $response);
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
