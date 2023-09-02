<?php

namespace App\Services\Payment\Checkout;

use App\Abstracts\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Wallet;
use App\Services\Service;
use App\Traits\PushNotificationTrait;
use Checkout\CheckoutApiException;
use Checkout\CheckoutArgumentException;
use Checkout\CheckoutSdk;
use Checkout\Common\Currency;
use Checkout\Environment;
use Checkout\Payments\CaptureRequest;
use Checkout\Payments\Request\PaymentRequest;
use Checkout\Payments\Request\Source\RequestTokenSource;


class PaymentService extends Service
{
    use PushNotificationTrait;

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
        $requestTokenSource = new RequestTokenSource();   // may be not the desired class , Check on Live
        $requestTokenSource->token = $req->token;
        $request = new PaymentRequest();
        $request->source = $requestTokenSource;

        $request->capture = false;
        $request->reference = "reference";
        $request->amount = $req->amount;
        $request->currency = Currency::$SAR;
        $request->processing_channel_id = getenv("CHECKOUT_PROCESSING_CHANNEL_ID");
        $response = $this->api->getPaymentsClient()->requestPayment($request);
        $capture = new CaptureRequest();
        $capture->processing_channel_id = getenv("CHECKOUT_PROCESSING_CHANNEL_ID");
        $res = $this->api->getPaymentsClient()->capturePayment($response['id'], $capture);
        if ($res) {
            $record = $this->createPaymentRecord($response, $req->order_id,$req->seller_id);
            $this->IncreaseWalletBalance($req->amount, $req->seller_id);
            $seller = $this->GetSeller($req->seller_id);
            $this->PushNotification(
                $seller->device_token,
                Notification::PAID,
                $req->seller_id,
                auth("sanctum")->user()->id,
                auth("sanctum")->user()->name
            );
            if ($record) {
                return true;
            }
            return false;
        }
        return false;
    }

    private function GetSeller($seller_id)
    {
        return User::find($seller_id);
    }
    private function createPaymentRecord($request, $order_id,$seller_id)
    {
        $payment = Payment::create([
            'payment_id' => $request['id'],
            'payment_Status' => $request['status'],
            'payment_method' => $request['source']['card_type'],
            'customer_id' => auth("sanctum")->user()->id,
            'order_id' => $order_id,
            'payment_response' => json_encode($request),
            'seller_id' => $seller_id,
        ]);
        $this->UpdateOrderWithPaymentID($payment->id, $order_id);
        return $payment;
    }


    /**
     * @throws CheckoutApiException
     */
//    private function ConfirmCheckout($payment_id,$amount,$seller_id): bool
//    {
//        $this->IncreaseWalletBalance($amount,$seller_id);
//        $request = new CaptureRequest();
//        $request->processing_channel_id = getenv("CHECKOUT_PROCESSING_CHANNEL_ID");
//        $response = $this->api->getPaymentsClient()->capturePayment($payment_id, $request);
//        if ($response) {
//
//            return $this->updatePaymentStatus($payment_id);
//        }
//        return false;
//    }

//    private function updatePaymentStatus($payment_id): bool
//    {
//        $payment = Payment::where("payment_id", $payment_id)->update([
//            'payment_status' => "captured"
//        ]);
//        if ($payment){
//            return true;
//        }
//        return false;
//    }

    private function UpdateOrderWithPaymentID($payment_id, $order_id)
    {
        $order = Order::find($order_id);
        $order->payment_id = $payment_id;
        $order->save();
    }


}
