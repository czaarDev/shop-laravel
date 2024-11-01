<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateAbandonedCartRequest;
use App\Models\AbandonedCart;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AbandonedCartApiController extends Controller
{

    public function store(StoreUpdateAbandonedCartRequest $request): JsonResponse
    {
        $abandonedCart = AbandonedCart::query()->updateOrCreate(
            [
                'email'        => $request->email,
                'phone_number' => $request->phone_number,
                'product_id'   => $request->product_id,
            ],
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'data'    => $abandonedCart
        ], Response::HTTP_OK);
    }

}
