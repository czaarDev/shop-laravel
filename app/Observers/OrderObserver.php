<?php

namespace App\Observers;

use App\Enums\StatusAbandonedCartEnum;
use App\Models\AbandonedCart;
use App\Models\Order;

class OrderObserver
{

    public function created(Order $order): void
    {
        $sessionKey = 'abandonedCart';

        if (session()->has($sessionKey)) {
            $abandonedCart = AbandonedCart::find(session()->pull($sessionKey)->id);

            if ($abandonedCart) {
                $abandonedCart->update(['order_id' => $order->id]);

                if ($order->isPaid()) {
                    $abandonedCart->update(['status' => StatusAbandonedCartEnum::CONVERTED]);
                }
            }
        }
    }

}
