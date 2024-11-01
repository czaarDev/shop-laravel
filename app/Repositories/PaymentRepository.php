<?php

namespace App\Repositories;

use App\Models\DiscountCoupon;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentRepository
{
    public function __construct(
        protected Payment $entity
    ) { }

    private function buildQuery(): Builder
    {
        $query = $this->entity::query();

        return $query;
    }

    public function all(): Collection
    {
        return $this->buildQuery()
                ->get();
    }

    public function paginate(int $limit = 15): LengthAwarePaginator
    {
        return $this->buildQuery()
                ->paginate($limit);
    }

    public function create(array $data): Payment
    {
        $payment = $this->entity::create($data);

        $payment->items()->createMany($data['items']);

        $coupon_code = $data['coupon'] ?? null;
        if ($coupon_code) {
            $coupon = DiscountCoupon::firstWhere('code', $coupon_code);

            $payment->discounts()->create([
                "discount_coupon_id" => $coupon->id,
            ]);
        }

        return $payment;
    }

}
