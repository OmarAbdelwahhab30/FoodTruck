<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\AddOrderRequest;
use App\Services\Orders\AddOrderService;
use Illuminate\Http\Request;

class AddOrderController extends Controller
{

    public function addOrder(AddOrderRequest $request,AddOrderService $service)
    {
        $service->addOrder($request);
    }
}
