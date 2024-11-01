<?php

namespace App\Http\Middleware;

use App\Models\AbandonedCart;
use Closure;
use Illuminate\Http\Request;

class HandleLinkAbandonedCartMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($abandonedCart = $request->query('abandonedCart')) {
            $dataAbandonedCart = optional(AbandonedCart::find(decrypt($abandonedCart)));

            session(['abandonedCart' => $dataAbandonedCart]);

            $infosProduct = $dataAbandonedCart->infosProduct;

            $cart = session()->get('cart');

            foreach ($infosProduct as $idProduct => $product) {
                $cart[$idProduct] = [
                    'name'       => $product['name'],
                    'price'      => $product['price'],
                    'image'      => $product['image'],
                    'attributes' => $product['attributes'],
                ];
            }

            session()->put('cart', $cart);

            return to_route('site.order.payment');
        }

        return $next($request);
    }
}
