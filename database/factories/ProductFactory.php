<?php

namespace Database\Factories;

use App\Enums\StatusEmum;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'description' => $this->faker->text(),
            'content' => $this->faker->text(500),
            'status' => StatusEmum::ACTIVE,
        ];
    }

    public function configure(): Factory
    {
        return $this->afterCreating(function (Product $product) {
            $product
                ->categories()
                ->attach(ProductCategory::query()->inRandomOrder()->limit(1)->get()->pluck('id')->toArray());

            $url = $this->faker->imageUrl(640, 480, 'books', true);
            $product
                ->addMediaFromUrl($url)
                ->toMediaCollection('photo');
        });
    }
}
