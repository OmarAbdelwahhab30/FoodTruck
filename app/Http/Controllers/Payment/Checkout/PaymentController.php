<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\Checkout\CheckoutRequest;
use App\Http\Requests\Payments\Checkout\ConfirmPaymentRequest;
use App\Services\Payment\Checkout\PaymentService;
use Checkout\CheckoutApiException;
use Checkout\CheckoutArgumentException;
use Checkout\CheckoutException;
use Checkout\CheckoutSdk;
use Checkout\Common\AccountHolderType;
use Checkout\Common\Country;
use Checkout\Common\Currency;
use Checkout\Environment;
use Checkout\Instruments\Get\BankAccountFieldQuery;
use Checkout\Instruments\Get\PaymentNetwork;
use Checkout\OAuthScope;
use Checkout\Payments\Destination\PaymentRequestDestination;
use Checkout\Payments\Request\PayoutBillingDescriptor;
use Checkout\Payments\Request\PayoutRequest;
use Checkout\Payments\Request\Source\PayoutRequestSource;
use Checkout\Payments\Sender\PaymentIndividualSender;

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


//    public function paypal()
//    {
//        $payer = new Payer();
//        $payer->setPaymentMethod("paypal");
//        $item1 = new Item();
//        $item1->setName('Ground Coffee 40 oz')
//            ->setCurrency('SAR')
//            ->setQuantity(1)
//            ->setPrice(7.5);
//
//        $item2 = new Item();
//        $item2->setName('Granola bars')
//            ->setCurrency('USD')
//            ->setQuantity(5)
//            ->setSku("321321") // Similar to `item_number` in Classic API
//            ->setPrice(2);
//
//        $itemList = new ItemList();
//        $itemList->setItems(array($item1, $item2));
//        $details = new Details();
//        $details->setShipping(1.2)
//            ->setTax(1.3)
//            ->setSubtotal(17.50);
//        $amount = new Amount();
//        $amount->setCurrency("SAR")
//            ->setTotal(20)
//            ->setDetails($details);
//        $transaction = new Transaction();
//        $transaction->setAmount($amount)
//            ->setItemList($itemList)
//            ->setDescription("Payment description")
//            ->setInvoiceNumber(uniqid());
//        $baseUrl = getBaseUrl();
//        $redirectUrls = new RedirectUrls();
//        $redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
//            ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");
//        $payment = new Payment();
//        $payment->setIntent("sale")
//            ->setPayer($payer)
//            ->setRedirectUrls($redirectUrls)
//            ->setTransactions(array($transaction));
//        $request = clone $payment;
//        $payment->create($apiContext);
//
//        return $payment;
//
//

   // }

    /**
     * @throws CheckoutArgumentException
     * @throws CheckoutException
     * @throws CheckoutApiException
     */
//    public function payout()
//    {
//
//        $api = CheckoutSdk::builder()->oAuth()
//            ->clientCredentials("ack_elzxyba4jfzu5klmjc2c43sq5i",
//                "TrdKq_xvVPEBPq2TaV7gBBO18u9SuVm0wGAQDrWoSbPyx-vhojNBJp5DlkOyjmJDRUUL_xyeQ6KTOLHniI9Eyw")
//            ->scopes([OAuthScope::$Balances])
//            ->environment(Environment::sandbox())
//            ->build();
//
////        $createCustomerInstrumentRequest = new CreateCustomerInstrumentRequest();
////        $createCustomerInstrumentRequest->id = "cus_rbc772a3o3eurft6b76kbu7upi";
////
////        $req = new CreateTokenInstrumentRequest();
////
////        $request = new CardTokenRequest();
////        $request->name = "Name";
////        $request->number = "4242424242424242";
////        $request->expiry_year = 2027;
////        $request->expiry_month = 10;
////        $request->cvv = "123";
////        $response = $api->getTokensClient()->requestCardToken($request);
////        $req->token = $response['token'];
////        $req->customer = $createCustomerInstrumentRequest;
////        return response()->json($req);
////        return $api->getInstrumentsClient()->create($req);
//
//
//
//        $SOURCE = new PayoutRequestSource("entity");
//
////        $SOURCE->type = "entity";
//        $SOURCE->id = "ent_ajcd5er6dbfckwe6iybc4il2o4";
//        $SOURCE->amount = 120;
//        //return response()->json($SOURCE);
//
//        $dest = new PaymentRequestDestination("bank_account");
//        $dest->type = 'bank_account';
//
//        $dest->account_number = "13654567"  ;
//        $dest->account_type   =  "current";
//        $dest->iban= "GB29NWBK60161331926819";
//        $dest->country =Country::$SA ;
//
//        $request = new PayoutRequest();
//        $request->source = $SOURCE;
//        $request->destination = $dest;
//        //$request->reference = "reference";
//
//        $request->currency = Currency::$SAR;
//        $request->amount = 120;
//
//
//        $request->processing_channel_id = "pc_pdwjxir5y5ouvo7too7kglmvpa";
//
//
//        return $api->getPaymentsClient()->requestPayout($request);
//
//
//    }


    /**
     * @throws CheckoutArgumentException
     * @throws CheckoutException
     */
    public function payout()
    {
//        $api = CheckoutSdk::builder()
//            ->staticKeys()
//            ->environment(Environment::sandbox())   // Change It on Live
//            ->publicKey(getenv("CHECKOUT_APP_KEY"))
//            ->secretKey(getenv("CHECKOUT_APP_SECRET"))
//            ->build();

        $api = CheckoutSdk::builder()->oAuth()
            ->clientCredentials(getenv("CHECKOUT_DEFAULT_OAUTH_CLIENT_ID"),getenv("CHECKOUT_DEFAULT_OAUTH_CLIENT_SECRET"))
            ->scopes([OAuthScope::$PayoutsBankDetails])
            ->environment(Environment::sandbox())
            ->build();

        return response()->json($api);

        $request = new BankAccountFieldQuery();
        $request->payment_network = PaymentNetwork::$local;
        $request->account_holder_type = AccountHolderType::$individual;

        $response = $api->getInstrumentsClient()->getBankAccountFieldFormatting(Country::$SA, Currency::$SAR, $request);
        return response()->json($response);

    }

}
