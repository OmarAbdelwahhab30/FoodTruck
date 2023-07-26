<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Checkout\CheckoutArgumentException;
use Checkout\Common\Address;
use Checkout\Common\Country;
use Checkout\Common\Phone;
use Illuminate\Http\Request;
use Checkout\CheckoutApiException;
use Checkout\CheckoutSdk;
use Checkout\Common\Currency;
use Checkout\Environment;
use Checkout\Payments\Request\PaymentRequest;
use Checkout\CheckoutAuthorizationException;
use Checkout\Common\CustomerRequest;
use Checkout\Payments\Request\Source\RequestCardSource;
use Checkout\Payments\Sender\Identification;
use Checkout\Payments\Sender\IdentificationType;
use Checkout\Payments\Sender\PaymentIndividualSender;

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


        $phone = new Phone();
        $phone->country_code = "+1";
        $phone->number = "415 555 2671";

        $address = new Address();
        $address->address_line1 = "CheckoutSdk.com";
        $address->address_line2 = "90 Tottenham Court Road";
        $address->city = "London";
        $address->state = "London";
        $address->zip = "W1T 4TJ";
        $address->country = Country::$GB;

        $requestCardSource = new RequestCardSource();
        $requestCardSource->name = "Name";
        $requestCardSource->number = "Number";
        $requestCardSource->expiry_year = 2026;
        $requestCardSource->expiry_month = 10;
        $requestCardSource->cvv = "123";
        $requestCardSource->billing_address = $address;
        $requestCardSource->phone = $phone;

        $customerRequest = new CustomerRequest();
        $customerRequest->email = "email@docs.checkout.com";
        $customerRequest->name = "Customer";

        $identification = new Identification();
        $identification->issuing_country = Country::$GT;
        $identification->number = "1234";
        $identification->type = IdentificationType::$drivingLicence;

        $paymentIndividualSender = new PaymentIndividualSender();
        $paymentIndividualSender->fist_name = "FirstName";
        $paymentIndividualSender->last_name = "LastName";
        $paymentIndividualSender->address = $address;
        $paymentIndividualSender->identification = $identification;

        $request = new PaymentRequest();
        $request->source = $requestCardSource;
        $request->capture = true;
        $request->reference = "reference";
        $request->amount = 10;
        $request->currency = Currency::$USD;
        $request->customer = $customerRequest;
        $request->sender = $paymentIndividualSender;


        return $api->getPaymentsClient()->requestPayment($request);

//
//        $request = new CardTokenRequest();
//        $request->name = "Name";
//        $request->number = "4242424242424242";
//        $request->expiry_year = 2027;
//        $request->expiry_month = 10;
//        $request->cvv = "123";
//        $token = $api->getTokensClient()->requestCardToken($request)['token'];
//
//        $requestTokenSource = new RequestTokenSource();
//        $requestTokenSource->token = $token;
//
//        $request = new PaymentRequest();
//        $request->source = $requestTokenSource;
//        $request->currency = Currency::$SAR;
//        $request->amount = 120;
//        $request->processing_channel_id = "pc_pdwjxir5y5ouvo7too7kglmvpa";
//
//        return $api->getPaymentsClient()->requestPayment($request);
//        //$checkout = new CheckoutApi(env('CHECKOUT_APP_SECRET'));
//
//
//          //  $transaction = $checkout->payments()->details("pay_dp4bm7d5ux7utmyd2kdkz3otm4");
//
//            // Return the transaction details as a JSON response
//            //return response()->json($transaction);
//
//
//        return $api->getPaymentsClient()->getPaymentDetails("pay_dp4bm7d5ux7utmyd2kdkz3otm4");


    }


    /**
     * @throws CheckoutArgumentException
     */
    public function createToken()
    {

    }
}
