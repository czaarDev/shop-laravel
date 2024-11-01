<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentOrder extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'payment_orders';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public const PAYMENT_METHOD_SELECT = [
        'credit_card' => 'Cartão de crédito',
        'billet'      => 'Boleto',
        'pix'         => 'PIX',
    ];

    public const PAYMENT_STATUS_SELECT = [
        'pending'  => 'Pendente',
        'pago'     => 'Pago',
        'canceled' => 'Cancelado',
        'overdue'  => 'Vencido',
    ];

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'payment_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
