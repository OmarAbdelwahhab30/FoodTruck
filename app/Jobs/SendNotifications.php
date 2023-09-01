<?php

namespace App\Jobs;

use App\Models\Role;
use App\Models\User;
use App\Models\User_Notification;
use App\Traits\PushNotificationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;

class SendNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Messaging $messaging;
    private array $check;
    private $notification;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __invoke(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    public function __construct($check,$notification)
    {
        $this->check = $check;
        $this->notification = $notification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $topic = "";
        if ($this->check && count($this->check) > 1) {
            $topic = "both";
            $this->SaveNotificationToDBForAll($this->notification);
        } elseif ($this->check && count($this->check) == 1) {
            if ($this->check[0] == "users") {
                $topic = "customers";
                $this->SaveNotificationToDBForCustomers($this->notification);
            } elseif ($this->check[0] == "sellers") {
                $topic = "sellers";
                $this->SaveNotificationToDBForSellers($this->notification);
            }
        }
        $message = CloudMessage::withTarget('topic', $topic)->withNotification([$this->notification]);
        $this->messaging->send($message);
    }

    private function SaveNotificationToDBForSellers($notification)
    {
        $users = User::where("role_id", Role::ROLE_SELLER)->get("id");
        foreach ($users as $user) {
            User_Notification::create([
                'notification_ar' => $notification,
                'notification_en' => $notification,
                'user_id' => $user->id
            ]);
        }
    }

    private function SaveNotificationToDBForCustomers($notification)
    {
        $users = User::where("role_id", Role::ROLE_CUSTOMER)->get("id");
        foreach ($users as $user) {
            User_Notification::create([
                'notification_ar' => $notification,
                'notification_en' => $notification,
                'user_id' => $user->id
            ]);
        }
    }

    private function SaveNotificationToDBForAll($notification)
    {
        $users = User::where("role_id", Role::ROLE_SELLER)->where("role_id", Role::ROLE_CUSTOMER)->get("id");
        foreach ($users as $user) {
            User_Notification::create([
                'notification_ar' => $notification,
                'notification_en' => $notification,
                'user_id' => $user->id
            ]);
        }
    }
}
