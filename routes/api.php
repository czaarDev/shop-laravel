<?php

use App\Http\Controllers\Api\V1\Public\Webhooks\AsaasApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Category
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // State
    Route::apiResource('states', 'StateApiController');

    // City
    Route::apiResource('cities', 'CityApiController');

    // Stock Product
    Route::apiResource('stock-products', 'StockProductApiController');

    // Item Order
    Route::apiResource('item-orders', 'ItemOrderApiController');

    // Order
    Route::apiResource('orders', 'OrderApiController');

    // Payment Order
    Route::apiResource('payment-orders', 'PaymentOrderApiController');

    // Delivery
    Route::post('deliveries/media', 'DeliveryApiController@storeMedia')->name('deliveries.storeMedia');
    Route::apiResource('deliveries', 'DeliveryApiController');

    // Content Category
    Route::apiResource('content-categories', 'ContentCategoryApiController');

    // Content Page
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');

    // Setting
    Route::apiResource('settings', 'SettingApiController');

    // Banner
    Route::post('banners/media', 'BannerApiController@storeMedia')->name('banners.storeMedia');
    Route::apiResource('banners', 'BannerApiController');

    // Post
    Route::post('posts/media', 'PostApiController@storeMedia')->name('posts.storeMedia');
    Route::apiResource('posts', 'PostApiController');

    // Faq Category
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Question
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Testimony
    Route::post('testimonies/media', 'TestimonyApiController@storeMedia')->name('testimonies.storeMedia');
    Route::apiResource('testimonies', 'TestimonyApiController');

    // Newsletter
    Route::apiResource('newsletters', 'NewsletterApiController');

    // Partner
    Route::post('partners/media', 'PartnerApiController@storeMedia')->name('partners.storeMedia');
    Route::apiResource('partners', 'PartnerApiController');
});

Route::group(['prefix' => 'v1/public', 'as' => 'api.public.', 'namespace' => 'Api\V1\Public'], function () {

    Route::controller(\App\Http\Controllers\Api\V1\Public\ShippingOptionController::class)->group(function () {
        Route::get('shipping-option/correios', 'correios')
            ->name('shipping-option.correios');

        Route::get('shipping-option/melhorEnvio', 'melhorEnvio')
            ->name('shipping-option.melhorEnvio');
    });

    Route::post('discounts/validateCoupon', [\App\Http\Controllers\Api\V1\Public\DiscountCouponApiController::class, 'validateCoupon'])
        ->name('discounts.validateCoupon');

    Route::post('webhooks/asaas/payments', [AsaasApiController::class, 'payments'])->name('webhooks.asaas.payments');
    Route::get('webhooks/asaas/check-payments', [AsaasApiController::class, 'checkPayments'])->name('webhooks.asaas.checkPayments');

    Route::post('abandoned-carts', [\App\Http\Controllers\Api\V1\Public\AbandonedCartApiController::class, 'store'])
        ->name('abandoned-carts.store');

});
