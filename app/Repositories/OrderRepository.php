<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderRepository
{
    public function __construct(
        protected Order $model
    ) { }

    private function buildQuery(): Builder
    {
        return $this->model::query()
            ->with(['order_items', 'order_items.product', 'user']);
    }

    public function create(array $data): Order
    {
        $order = $this->model::query()->create($data);;

        $order->order_items()->createMany($data['order_items']);

        $order->order_payments()->createMany($data['order_payments']);

        return $order;
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

    public function getOrdersByUser(): Collection
    {
        return $this->buildQuery()
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->get();
    }

}
