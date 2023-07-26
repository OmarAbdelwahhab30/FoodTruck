<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Checkout\CheckoutApi;
use Checkout\CheckoutArgumentException;
use Checkout\Common\Address;
use Checkout\Common\Country;
use Checkout\Common\Phone;
use Checkout\Tokens\CardTokenRequest;
use Illuminate\Http\Request;
use Checkout\CheckoutApiException;
use Checkout\CheckoutException;
use Checkout\CheckoutSdk;
use Checkout\Common\Currency;
use Checkout\Environment;
use Checkout\Payments\Request\PaymentRequest;
use Checkout\Payments\Request\Source\RequestTokenSource;
use Illuminate\Support\Facades\Http;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
class PaymentController extends Controller
{

    /**
     * @throws CheckoutArgumentException
     * @throws CheckoutApiException
     */

    // Master-Card * Visa * Credit Card * American Express.
    public function ExecutePayment(Request $request)
    {
        $api = CheckoutSdk::builder()
            ->staticKeys()
            ->environment(Environment::sandbox())
            ->publicKey(getenv("CHECKOUT_APP_KEY"))
            ->secretKey(getenv("CHECKOUT_APP_SECRET"))
            ->build();


        $request = new CardTokenRequest();
        $request->name = "Name";
        $request->number = "4242424242424242";
        $request->expiry_year = 2027;
        $request->expiry_month = 10;
        $request->cvv = "123";
        $token = $api->getTokensClient()->requestCardToken($request)['token'];

        $requestTokenSource = new RequestTokenSource();
        $requestTokenSource->token = $token;

        $request = new PaymentRequest();
        $request->source = $requestTokenSource;
        $request->currency = Currency::$SAR;
        $request->amount = 120;
        $request->processing_channel_id = "pc_pdwjxir5y5ouvo7too7kglmvpa";

        return $api->getPaymentsClient()->requestPayment($request);
        $checkout = new CheckoutApi(env('CHECKOUT_APP_SECRET'));


            $transaction = $checkout->payments()->details("pay_dp4bm7d5ux7utmyd2kdkz3otm4");

            // Return the transaction details as a JSON response
            return response()->json($transaction);


        return $api->getPaymentsClient()->getPaymentDetails("pay_dp4bm7d5ux7utmyd2kdkz3otm4");


    }


    /**
     * @throws CheckoutArgumentException
     */
    public function createToken()
    {

    }
}
