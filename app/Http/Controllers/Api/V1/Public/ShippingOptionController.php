<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Freight\Correios\Client;
use App\Services\Freight\Correios\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use MelhorEnvio\Shipment;
use MelhorEnvio\Resources\Shipment\Product as ProductShipment;
use MelhorEnvio\Enums\Environment;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShippingOptionController extends Controller
{

    public function correios(Request $request): JsonResponse
    {
        try {
            $shippingOptionsCorreios = [];
            $itemsCart               = $request->only('items');
            $zipCode                 = $request->zipcode;

            $freight = (new Client())->freight();

            $freight
                ->origin("64052335")
                ->destination($zipCode)
                ->services(Service::SEDEX, Service::PAC);

            $productsCart = Product::query()
                ->select(['id', 'attributes'])
                ->whereIntegerInRaw('id', $itemsCart)
                ->get();

            foreach ($productsCart as $product) {
                $weight_in_kg = $product->attributes['weight'] / 1000;

                $freight->item($product->attributes['width'], $product->attributes['height'], $product->attributes['length'], $weight_in_kg, 1);
             }

            $shippingOptionsCorreios = $freight->calculate();
            $shippingOptionsCorreios = collect($shippingOptionsCorreios)->filter(fn($item) => $item['price'] > 0)->toArray();

            $response = [
                'success' => true,
                'data' => $shippingOptionsCorreios,
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function melhorenvio(Request $request): JsonResponse
    {
        $shipment = new Shipment(config('services.melhorEnvio.token'), Environment::SANDBOX);

        $calculator = $shipment->calculator();
        $calculator->postalCode(from: '01010010', to: '20271130');

        $calculator->addProducts(
            new ProductShipment(uniqid(), 40, 30, 50, 10.00, 100.0, 1),
        );

        $quotations = $calculator->calculate();

        return response()->json($quotations);
    }

}
