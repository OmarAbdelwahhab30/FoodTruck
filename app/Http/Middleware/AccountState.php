<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponseHandler;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountState
{
    use ApiResponseHandler;

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->active == 0){
            return $this->returnError("Your Account is deactivated by the owner. Contact with the technical support.");
        }
        return $next($request);
    }
}
