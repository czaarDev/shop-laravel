<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use SerializesModels;

    public function __construct(
        public Order $order
    ) { }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
            replyTo: [
                new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
            ],
            subject: 'Recebemos seu pedido do produto ' . $this->order->order_items->implode('product.name')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.orders.orderCreated',
            with: [
                'order' => $this->order,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }

}
