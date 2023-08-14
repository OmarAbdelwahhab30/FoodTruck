<?php

namespace App\Traits;

use App\Models\Wallet;

trait EnvHandlerTrait
{


    public function changeEnv($key, $value)
    {
        $path = base_path('.env');

        $FIRST  = $key."=".getenv($key);
        $SECOND = $key."=".$value;
        if (file_exists($path)) {
            file_put_contents($path, str_replace((string)$FIRST, (string)$SECOND, file_get_contents($path)));
            return true;
        }
        return false;
    }
}
