<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CityRepository
{
    public function __construct(
        protected City $entity
    ) { }

    private function buildQuery(): Builder
    {
        $query = $this->entity::query();

        $q = request('q');
        if (!empty($q)) {
            $query = $query->where('name', 'like', "%{$q}%");
        }

        return $query->with('state');
    }

    public function all(): Collection
    {
        return cache()->remember('cities', 60 * 60 * 24, function () {
            return $this->buildQuery()
                ->oldest('name')
                ->get();
        });
    }

    public function paginate(int $limit = 15): LengthAwarePaginator
    {
        return $this->buildQuery()
                ->latest()
                ->paginate($limit);
    }

}
