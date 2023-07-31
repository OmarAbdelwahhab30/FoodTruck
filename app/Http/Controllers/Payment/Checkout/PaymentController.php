<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\Checkout\CheckoutRequest;
use App\Http\Requests\Payments\Checkout\ConfirmPaymentRequest;
use App\Services\Payment\Checkout\PaymentService;
use Checkout\CheckoutApiException;
use Checkout\CheckoutArgumentException;


class PaymentController extends Controller
{


    private \Checkout\CheckoutApi $api;

    /**
     * @throws CheckoutArgumentException
     */

    // Master-Card * Visa * Credit Card * American Express.

    /**
     * @throws CheckoutApiException
     */
    public function ExecutePayment(CheckoutRequest $req, PaymentService $service): \Illuminate\Http\JsonResponse
    {

        $done = $service->ExecutePayment($req);
        if ($done)
        {
            return $this->returnData(__("Payment"),$done,__("responses.Here is payment Info"));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

    /**
     * @throws CheckoutApiException
     */
    public function ConfirmPayment(ConfirmPaymentRequest $req, PaymentService $service): \Illuminate\Http\JsonResponse
    {
        if ($service->ConfirmCheckout($req->payment_id))
        {
            return $this->returnSuccessMessage(__("responses.Payment has been completed successfully."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }

}
