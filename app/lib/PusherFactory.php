<?php

namespace App\lib;

use Pusher\Pusher;
use Pusher\PusherException;

class PusherFactory
{


    /**
     * @throws PusherException
     */
    public static function make(): Pusher
    {
        return new Pusher(
            env("PUSHER_APP_KEY"),
            env("PUSHER_APP_SECRET"),
            env("PUSHER_APP_ID"),
            array(
                'cluster' => env("PUSHER_APP_CLUSTER"),
                'encrypted' => true,
            )
        );
    }
}
