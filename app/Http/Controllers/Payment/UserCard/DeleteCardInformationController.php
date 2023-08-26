<?php

namespace App\Http\Controllers\Payment\UserCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\UserCard\AddCardInfoRequest;
use App\Http\Requests\Payments\UserCard\DeleteCardInfoRequest;
use App\Services\Payment\UserCard\AddCardInformationService;
use App\Services\Payment\UserCard\DeleteCardInformationService;
use Illuminate\Support\Facades\Gate;

class DeleteCardInformationController extends Controller
{


    public function deleteCardInformation(DeleteCardInfoRequest $request,DeleteCardInformationService $service)
    {
        if (! Gate::allows('delete-payment-card-info')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $added = $service->deleteCardInformation($request);
        if ($added){
            return $this->returnSuccessMessage(__("responses.Card information has been deleted successfully."));
        }
        return $this->returnError(__("responses.Some thing went wrong ,try again later"));
    }
}
