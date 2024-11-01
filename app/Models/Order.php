<?php

namespace App\Models;

use App\Observers\OrderObserver;
use App\Traits\Auditable;
use App\Traits\HasSchemalessAttributes;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Masterix21\Addressable\Models\Address;

#[ObservedBy(OrderObserver::class)]
class Order extends Model
{

    use SoftDeletes;
    use Auditable;
    use HasSchemalessAttributes;

    public $table = 'orders';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'response_gateway' => 'array',
    ];

    public const PAYMENT_METHOD_SELECT = [
        'credit_card' => 'Cartão de crédito',
        'billet'      => 'Boleto bancário',
        'pix'         => 'PIX',
    ];

    public const PAYMENT_STATUS_SELECT = [
        'pending'  => 'Pendente',
        'paid'     => 'Pago',
        'canceled' => 'Cancelado',
        'overdue'  => 'Vencido',
    ];

    protected $fillable = [
        'user_id',
        'gateway',
        'external_identification',
        'external_url',
        'response_gateway',
        'amount',
        'payment_method',
        'payment_status',
        'delivery_address_id',
    ];

    public static array $statusForPaid = ['captured', 'paid', 'paid_out', 'payment_accept', 'received', 'active', 'confirmed'];

    public static array $statusForPending = ['pending', 'authorized_pending_capture', 'partial_capture', 'waiting_capture', 'waiting_for_approval'];

    public static array $statusForFailed = ['not_authorized', 'failed', 'error_on_voiding', 'error_on_refunding', 'with_error'];

    public static array $statusForCanceled = ['canceled', 'refunded', 'voided', 'partial_refunded', 'partial_void', 'waiting_cancellation', 'chargeback', 'unpaid', 'overdue'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order_items()
    {
        return $this->hasMany(ItemOrder::class);
    }

    public function order_payments()
    {
        return $this->hasMany(PaymentOrder::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'delivery_address_id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class)->latestOfMany();
    }

    public function getpaymentStatusAttribute($value): string
    {
        $payment_status = '';

        if (in_array(strtolower($value), array_map('strtolower', self::$statusForFailed))) {
            $payment_status = 'Falha';
        } elseif (in_array(strtolower($value), array_map('strtolower', self::$statusForCanceled))) {
            $payment_status = 'Cancelado';
        } elseif (in_array(strtolower($value), array_map('strtolower', self::$statusForPaid))) {
            $payment_status = 'Pago';
        } elseif (in_array(strtolower($value), array_map('strtolower', self::$statusForPending))) {
            $payment_status = 'Pendente';
        }

        return strtoupper($payment_status);
    }

    public function getPaymentMethodAttribute($value): string
    {
        $payment_method = '';

        if (strtolower($value) == 'credit_card') {
            $payment_method = 'Cartão de Crédito';
        } elseif (strtolower($value) == 'boleto') {
            $payment_method = 'Boleto';
        } elseif (strtolower($value) == 'pix') {
            $payment_method = 'Pix';
        }

        return mb_strtoupper($payment_method, 'UTF-8');
    }

    public function isPaid(): bool
    {
        return in_array(strtolower($this->getRawOriginal('payment_status')), array_map('strtolower', self::$statusForPaid));
    }

    public function isPending(): bool
    {
        return in_array(strtolower($this->getRawOriginal('payment_status')), array_map('strtolower', self::$statusForPending));
    }

    public function isCanceled(): bool
    {
        return in_array(strtolower($this->getRawOriginal('payment_status')), array_map('strtolower', self::$statusForCanceled));
    }

    public function isFailed(): bool
    {
        return in_array(strtolower($this->getRawOriginal('payment_status')), array_map('strtolower', self::$statusForFailed));
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
