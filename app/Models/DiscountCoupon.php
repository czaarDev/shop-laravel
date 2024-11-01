<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountCoupon extends Model
{
    use SoftDeletes;
    use Auditable;

    public const TYPE_RADIO = [
        'value'   => 'Valor',
        'percent' => 'Porcentagem',
    ];

    public $table = 'discount_coupons';

    public static $searchable = [
        'code',
    ];

    protected $dates = [
        'start_at',
        'end_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'description',
        'amount',
        'type',
        'quantity',
        'start_at',
        'end_at',
        'is_direct_payment',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getStartAtAttribute($value)
    {
        return $value
            ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format'))
            : null;
    }

    public function setStartAtAttribute($value)
    {
        $this->attributes['start_at'] = $value
            ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s')
            : null;
    }

    public function getEndAtAttribute($value)
    {
        return $value
                ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format'))
                : null;
    }

    public function setEndAtAttribute($value)
    {
        $this->attributes['end_at'] = $value
            ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s')
            : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function usage(): HasMany
    {
        return $this->hasMany(Order::class, 'discount_coupon_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

}
