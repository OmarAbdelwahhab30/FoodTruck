<?php

namespace App\Http\Controllers\Terms;

use App\Http\Controllers\Controller;
use App\Models\Terms;
use Illuminate\Support\Facades\Gate;

class ReturnTermsController extends Controller
{
    public function returnTerms(): \Illuminate\Http\JsonResponse
    {
        if (! Gate::allows('return-terms')) {
            return $this->notAuthorized(__("responses.You don't have the authorization on this action."));
        }
        $terms = Terms::first();
        if ($terms) {
            return $this->returnData("terms",$terms,"");
        }
        return $this->returnError(__("responses.No information to show"));
    }
}
