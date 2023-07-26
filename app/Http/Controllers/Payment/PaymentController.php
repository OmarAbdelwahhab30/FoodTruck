<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
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
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
class PaymentController extends Controller
{

    /**
     * @throws CheckoutArgumentException
     * @throws CheckoutApiException
     */
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





    }


    /**
     * @throws CheckoutArgumentException
     */
    public function createToken()
    {

    }
}
