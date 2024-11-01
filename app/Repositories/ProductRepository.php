<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function __construct(
        protected Product $model
    ) { }

    private function buildQuery(): Builder
    {
        $query = $this->model::query()
            ->with(['media']);

        $search = request('search');
        if (!empty($search)) {
            $query = $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }


        $category_id = request('category_id');
        if (!empty($category_id)) {
            $query = $query->whereHas('categories', function ($query) use ($category_id) {
                $query->where('id', $category_id);
            });
        }

        return $query;
    }

    public function all(): Collection
    {
        return $this->buildQuery()
                ->active()
                ->latest()
                ->get();
    }

    public function allToHome(): Collection
    {
        return ProductCategory::with(['products.media', 'products' => function ($query) {
            $query->latest()->limit(5);
        }])->get();
    }

    public function paginate(int $limit = 15): LengthAwarePaginator
    {
        return $this->buildQuery()
                ->paginate($limit);
    }

}
