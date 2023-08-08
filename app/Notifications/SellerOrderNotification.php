<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

class SellerOrderNotification extends Notification
{
    use Queueable;

    public function __construct(private  $customerName)
    {
        $this->customerName = $customerName;
    }

    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }
    public function toOneSignal(){

        return OneSignalMessage::create()
            ->setSubject($this->customerName. " sent you an order.");
    }

}
