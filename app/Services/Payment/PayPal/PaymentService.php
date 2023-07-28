<?php

namespace App\Services\Payment\PayPal;

use App\Models\Payment;
use App\Services\Service;
use Checkout\CheckoutApiException;
use Checkout\CheckoutArgumentException;
use Checkout\CheckoutSdk;
use Checkout\Common\Currency;
use Checkout\Environment;
use Checkout\Payments\Previous\CaptureRequest;
use Checkout\Payments\Request\PaymentRequest;
use Checkout\Payments\Request\Source\RequestCardSource;
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
        $requestCardSource = new RequestCardSource();
        $requestCardSource->name = "Name";
        $requestCardSource->number = "Number";
        $requestCardSource->expiry_year = 2026;
        $requestCardSource->expiry_month = 10;
        $requestCardSource->cvv = "123";



        $request = new PaymentRequest();
        $request->source = $requestCardSource;
        $request->capture = true;
        $request->reference = "reference";
        $request->amount = 10;
        $request->currency = Currency::$USD;
        $request->source->type = "paypal";
        $request->

        $response = $this->api->getPaymentsClient()->requestPayment($request);
    }
}
