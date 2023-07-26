<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\Checkout\CheckoutRequest;
use App\Http\Requests\Payments\Checkout\ConfirmPaymentRequest;
use App\Services\Payment\Checkout\PaymentService;
use Checkout\CheckoutApiException;
use Checkout\CheckoutArgumentException;
use Checkout\CheckoutSdk;
use Checkout\Environment;


class PaymentController extends Controller
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

    // Master-Card * Visa * Credit Card * American Express.

    /**
     * @throws CheckoutApiException
     */
    public function ExecutePayment(CheckoutRequest $req, PaymentService $service): \Illuminate\Http\JsonResponse
    {

        $done = $service->ExecutePayment($req);
        if ($done)
        {
            return $this->returnData("Payment",$done,"Here is payment Info");
        }
        return $this->returnError("Something went wrong ,try again later.");
    }

    /**
     * @throws CheckoutApiException
     */
    public function ConfirmPayment(ConfirmPaymentRequest $req, PaymentService $service): \Illuminate\Http\JsonResponse
    {
        if ($service->ConfirmCheckout($req->payment_id))
        {
            return $this->returnSuccessMessage("Payment has been completed successfully.");
        }
        return $this->returnError("Something went wrong ,try again later.");
    }

}
