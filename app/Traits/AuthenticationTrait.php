<?php

namespace App\Traits;

use Illuminate\Support\Facades\Gate;

Trait AuthenticationTrait{

use ApiResponseHandler;

    public function checkAuth(){
        return auth('sanctum')->user();
    }

}
