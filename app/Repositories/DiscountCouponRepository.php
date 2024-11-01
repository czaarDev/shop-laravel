<?php

namespace App\Repositories;

use App\Models\DiscountCoupon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class DiscountCouponRepository
{
    public function __construct(
        protected DiscountCoupon $entity
    ) { }

    private function buildQuery(): Builder
    {
        $query = $this->entity::query();

        $code = request('code') ?? '';
        if (! empty($code)) {
            $query = $query->where('code', 'like', '%'.$code.'%');
        }

        return $query->active();
    }

    public function all(): Collection
    {
        return $this->buildQuery()
                ->latest()
                ->get();
    }

    public function paginate(int $limit = 15): LengthAwarePaginator
    {
        return $this->buildQuery()
                ->latest()
                ->paginate($limit);
    }

    public function validateCoupon(string $code)
    {
        $query = $this->entity::query();

        $query->active()
            ->whereCode($code)
            ->whereRaw('NOW() BETWEEN start_at AND end_at');

        return $query->first();
    }

    public function getValueDiscount(DiscountCoupon $coupon, $total)
    {
        if ($coupon->type == 'value') {
            return $coupon->amount;
        } else {
            return ($total * $coupon->amount) / 100;
        }
    }

}
