<?php

namespace App\Interfaces\Auth;


use Illuminate\Http\Request;

interface RegisterInterface
{
    public function register(Request $request);
}
