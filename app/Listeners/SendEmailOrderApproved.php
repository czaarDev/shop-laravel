<?php

namespace App\Listeners;

use App\Events\OrderApproved;
use Illuminate\Support\Facades\Mail;

class SendEmailOrderApproved
{

    public function handle(OrderApproved $event): void
    {
        Mail::to($event->order->user->email)
            ->queue(new \App\Mail\OrderApproved($event->order));
    }

}
