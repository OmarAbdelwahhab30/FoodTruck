<?php

namespace App\Services\Payment\Checkout;

use App\Models\Payment;
use App\Services\Service;
use Checkout\CheckoutApiException;
use Checkout\CheckoutArgumentException;
use Checkout\CheckoutSdk;
use Checkout\Common\Currency;
use Checkout\Environment;
use Checkout\Payments\Previous\CaptureRequest;
use Checkout\Payments\Request\PaymentRequest;
use Checkout\Payments\Request\Source\RequestTokenSource;


class PaymentService extends Service
{


    private \Checkout\CheckoutApi $api;

    /**
     * @throws CheckoutArgumentException
     */
    public function __construct()
    {
        $this->api = CheckoutSdk::builder()
            ->staticKeys()
            ->environment(Environment::sandbox())   // Change It on Live
            ->publicKey(getenv("CHECKOUT_APP_KEY"))
            ->secretKey(getenv("CHECKOUT_APP_SECRET"))
            ->build();
    }
    /**
     * @throws CheckoutApiException
     */

    // Master-Card * Visa * Credit Card * American Express.
    public function ExecutePayment($req)
    {

        $request = new PaymentRequest();
        $request->capture = false;
        $request->reference = "reference";
        $request->amount = $req->amount;
        $request->currency = Currency::$SAR;
        $request->processing_channel_id = "pc_pdwjxir5y5ouvo7too7kglmvpa";

        $requestTokenSource = new RequestTokenSource();   // may be not the desired class , Check on Live
        $requestTokenSource->token = $req->token;

        $request = new PaymentRequest();
        $request->source = $requestTokenSource;


         $response = $this->api->getPaymentsClient()->requestPayment($request);
         if ($response['approved'] === true)
         {
             $record = $this->createPaymentRecord($response,$req->order_id);
             if ($record){
                 return $this->createPaymentRecord($response,$req->order_id);
             }
             return false;
         }
         return false;
    }

    private function createPaymentRecord($request,$order_id)
    {
        return Payment::create([
            'payment_id'        => $request['id'],
            'payment_Status'    => $request['status'],
            'payment_method'    => $request['source']['card_type'],
            'customer_id'       => auth("sanctum")->user()->id,
            'order_id'          => $order_id,
            'payment_response'  => json_encode($request),
        ]);
    }


    /**
     * @throws CheckoutApiException
     */
    public function ConfirmCheckout($payment_id): bool
    {
        $request = new CaptureRequest();
        $request->processing_channel_id = getenv("CHECKOUT_PROCESSING_CHANNEL_ID");
        $response = $this->api->getPaymentsClient()->capturePayment($payment_id, $request);
        if ($response) {
            return $this->updatePaymentStatus($payment_id);
        }
        return false;
    }

    public function updatePaymentStatus($payment_id): bool
    {
        $payment = Payment::where("payment_id", $payment_id)->update([
            'payment_status' => "captured"
        ]);
        if ($payment){
            return true;
        }
        return false;
    }
}
