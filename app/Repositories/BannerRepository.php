<?php

namespace App\Repositories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BannerRepository
{
    public function __construct(
        protected Banner $model
    ) { }

    private function buildQuery(): Builder
    {
        return $this->model::query()
            ->with('media');
    }

    public function all(): Collection
    {
        return cache()->remember('banners', 60 * 60 * 24, function () {
            return $this->buildQuery()
                ->active()
                ->oldest('position')
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
