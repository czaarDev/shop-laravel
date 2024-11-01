<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function __construct(
        protected User $model
    ) { }

    private function buildQuery(): Builder
    {
        $query = $this->model::query();

        return $query;
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
}
