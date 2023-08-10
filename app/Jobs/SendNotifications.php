<?php

namespace App\Jobs;

use App\Models\User;
use App\Traits\PushNotificationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Ladumor\OneSignal\OneSignal;

class SendNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, PushNotificationTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $users,$notification)
    {
        $this->users = $users;
        $this->notification = $notification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->users as $user) {
            $fields['include_player_ids'][] = $user->player_id;
        }
        $message = $this->notification;
        OneSignal::sendPush($fields, $message);
    }
}
