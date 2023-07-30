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

    public function payout()
    {

//        $api = CheckoutSdk::builder()
//            ->staticKeys()
//            ->environment(Environment::sandbox())   // Change It on Live
//            ->publicKey(getenv("CHECKOUT_APP_KEY"))
//            ->secretKey(getenv("CHECKOUT_APP_SECRET"))
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
//        $SOURCE = new PayoutRequestSource("currency_account");
//        $SOURCE->amount = 120;
//
//        $billing = new PayoutBillingDescriptor();
//        $billing->reference = "reference";
//
//        $dest = new PaymentRequestDestination("bank_account");
//        $dest->type = 'bank_account';
//
//        $dest->account_number = "13654567"  ;
//        $dest->account_type   =  "current";
//        $dest->iban= "GB29NWBK60161331926819";
//        $dest->country =Country::$GB ;
//
//        $request = new PayoutRequest();
//        $request->source = $SOURCE;
//        $request->destination = $dest;
//        $request->reference = "reference";
//
//        $request->currency = Currency::$EUR;
//        $request->amount = 120;
//
//
//        $request->processing_channel_id = getenv("CHECKOUT_PROCESSING_CHANNEL_ID");
//        $request->billing_descriptor = $billing;
//        $sender = new PaymentIndividualSender();
//        $sender->type = "individual";
//        $sender->address = "galaa";
//        $sender->fist_name = "omar";
//        $sender->identification = ""
//
//        try {
//            return $api->getPaymentsClient()->requestPayout($request);
//        }catch (CheckoutApiException $e){
//            // API error
//            $error_details = $e->error_details;
//            $http_status_code = isset($e->http_metadata) ? $e->http_metadata->getStatusCode() : null;
//            return response()->json($e->getMessage());
//        }

    }


//    public function payout()
//    {
//        $api = CheckoutSdk::builder()
//            ->staticKeys()
//            ->environment(Environment::sandbox())   // Change It on Live
//            ->publicKey(getenv("CHECKOUT_APP_KEY"))
//            ->secretKey(getenv("CHECKOUT_APP_SECRET"))
//            ->build();
//
//
//
//    }

}
