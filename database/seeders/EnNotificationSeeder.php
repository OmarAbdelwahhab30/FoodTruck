<?php

namespace Database\Seeders;

use App\Models\EnNotification;
use Illuminate\Database\Seeder;

class EnNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            'OrderAdded'       => "@Requests for an order.",
            'OrderAccepted'    => "Order has accepted now.",
            'OrderPickedUp'   => "order has picked up.",
            'OrderCancelled'   => "Unfortunately, the order is cancelled",
            'OrderDelivered'   => "Order has delivered now.",
            'PAID'              => "The fees has been paid by@.",
            "REVIEW"            => "@posted a review about you.",
        ];

        foreach ($notifications as $key => $value){
            EnNotification::create([
                'key'   => $key,
                'value' => $value,
            ]);
        }
    }
}
