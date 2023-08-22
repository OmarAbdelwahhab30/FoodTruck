<?php

namespace App\Traits;

trait CurrentTimeTrait
{
    function GetCurrentTime()
    {
        return date("D h:i a");
    }

}
