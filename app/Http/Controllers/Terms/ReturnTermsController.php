<?php

namespace App\Http\Controllers\Terms;

use App\Http\Controllers\Controller;
use App\Models\Terms;
use Illuminate\Http\Request;

class ReturnTermsController extends Controller
{
    public function returnTerms(): \Illuminate\Http\JsonResponse
    {
        $terms = Terms::first();
        if ($terms) {
            return $this->returnData("terms",$terms,"");
        }
        return $this->returnError("No information to show");
    }
}
