<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                "name" => "Paradidáticos",
                "description" => "Leia, aprenda e inspire-se com nossa seleção diversificada de paradidáticos da Vortex Educação.",
                "status" => "active",
            ],
            [
                "name" => "Livros",
                "description" => "Leia, aprenda e inspire-se com nossa seleção diversificada de livros da Vortex Educação.",
                "status" => "active",
            ],
            [
                "name" => "Jogos Educativos",
                "description" => "Divirta-se e aprenda ao mesmo tempo com nossos jogos educativos da Vortex Educação. Aprender nunca foi tão divertido!",
                "status" => "active",
            ],
        ];

        foreach ($items as $item) {
           ProductCategory::query()->updateOrCreate(
                [
                    "name" => $item["name"],
                ],
                [
                    "description" => $item["description"],
                    "status" => $item["status"],
                ]
           );
        }
    }
}
