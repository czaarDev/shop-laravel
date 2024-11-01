<?php

namespace App\Providers;

use App\Repositories\ProductCategoryRepository;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(
        ProductCategoryRepository $productCategoryRepository,
    ): void
    {
        $productCategories = $productCategoryRepository->all();

        view()->composer(['site.*', 'auth.*'], function ($view) use ($productCategories) {
            $view->with('productCategories', $productCategories);

            $cart = session()->get('cart')
                ? collect(session()->get('cart'))
                : collect();

            $view->with('cart', $cart);
        });
    }

}
