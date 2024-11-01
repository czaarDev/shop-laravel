<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use App\Enums\StatusAbandonedCartEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbandonedCart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'amount',
        'payment_method',
        'status',
        'order_id',
        'product_id',
        'link_checkout',
        'infosProduct',
    ];

    protected $casts = [
        'stauts'         => StatusAbandonedCartEnum::class,
        'payment_method' => PaymentMethod::class,
        'infosProduct'   => 'array',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function linkCheckout(): Attribute
    {
        return Attribute::make(
            get: function () {
                return route('site.order.payment', ['abandonedCart' => encrypt($this->id)]);
            },
        )->shouldCache();
    }

}
