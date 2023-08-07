<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Traits\ApiResponseHandler;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerCanAccess
{

    use ApiResponseHandler;
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (auth()->user()->role_id == Role::ROLE_SELLER && auth()->user()->accepted == 0){
                return $this->returnError("You are not accepted yet, try again later");
            }
        }
        return $next($request);
    }
}
