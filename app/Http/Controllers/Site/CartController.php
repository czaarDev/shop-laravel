<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{

    public function index(): View
    {
        return view('site.cart.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|exists:products,id',
        ]);

        $cart = session()->get('cart');

        $product = Product::query()->firstWhere('id', $request->get('id'));

        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->photo?->first()->getUrl(),
            'attributes' => $product->attributes,
        ];

        session()->put('cart', $cart);

        toastr()->addInfo('Produto adicionado no carrinho.');

        return back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|exists:products,id',
        ]);

        $cart = session()->get('cart');

        $id = $request->get('id');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        toastr()->addInfo('Produto removido do carrinho.');

        return back();
    }

}
