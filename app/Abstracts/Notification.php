<?php

namespace App\Abstracts;

abstract class Notification
{
    const OrderAdded = 1;
    const OrderAccepted = 2;
    const OrderPickedUp = 3;
    const OrderCancelled = 4;
    const OrderDelivered = 5;

    const PAID = 6;

    const REVIEW =7;

    const MESSAGE = 8;
}
