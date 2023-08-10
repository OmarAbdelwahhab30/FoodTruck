<?php

namespace App\Listeners;

use App\Events\SendNotificationEvent;
use App\Jobs\SendNotifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class PushNotificationsToUsers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(SendNotificationEvent $event)
    {
        SendNotifications::dispatch($event->users,$event->notification);
    }

}
