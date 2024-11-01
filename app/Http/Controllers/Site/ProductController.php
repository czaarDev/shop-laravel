<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\{Product};
use App\Repositories\ProductRepository;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function __construct(
        public ProductRepository $productRepository
    ) { }

    public function index(): View
    {
        return view('site.product.list', [
            'title' => "Produtos - " . config('app.name'),
            'description' => "Produtos - " . config('app.name'),
            'products' => $this->productRepository->paginate(),
        ]);
    }

    public function show(Product $product): View
    {
        $product->load(['media', 'categories']);

        return view('site.product.show', [
            'title' => $product->name,
            'description' => $product->description,
            'product' => $product,
        ]);
    }

}
