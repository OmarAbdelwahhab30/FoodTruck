<?php

namespace App\Traits;

Trait AuthenticationTrait{



    public function checkAuth(){
        return auth('sanctum')->user();
    }
}
