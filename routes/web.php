<?php

use Laravel\Socialite\Facades\Socialite;

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('auth/redirect/{driver}', function ($driver) {
    return Socialite::driver($driver)->redirect();
})->name('social.redirect');

Route::get('/auth/callback/{driver}', 'Auth\LoginController@handleProviderCallbackSocialLogin')->name('social.callback');

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');

Auth::routes();

Route::get('auth/redirect/{driver}', function ($driver) {
    return Socialite::driver($driver)->redirect();
})->name('social.redirect');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::post('product-categories/parse-csv-import', 'ProductCategoryController@parseCsvImport')->name('product-categories.parseCsvImport');
    Route::post('product-categories/process-csv-import', 'ProductCategoryController@processCsvImport')->name('product-categories.processCsvImport');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // State
    Route::delete('states/destroy', 'StateController@massDestroy')->name('states.massDestroy');
    Route::resource('states', 'StateController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Stock Product
    Route::delete('stock-products/destroy', 'StockProductController@massDestroy')->name('stock-products.massDestroy');
    Route::resource('stock-products', 'StockProductController');

    // Item Order
    Route::delete('item-orders/destroy', 'ItemOrderController@massDestroy')->name('item-orders.massDestroy');
    Route::resource('item-orders', 'ItemOrderController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::post('orders/{order}/approvePayment', 'OrderController@approvePayment')->name('orders.approvePayment');
    Route::get('orders/{order}/delivery', 'OrderController@delivery')->name('orders.delivery');
    Route::put('orders/{order}/updateDelivery', 'OrderController@updateDelivery')->name('orders.updateDelivery');
    Route::resource('orders', 'OrderController');

    // Payment Order
    Route::delete('payment-orders/destroy', 'PaymentOrderController@massDestroy')->name('payment-orders.massDestroy');
    Route::resource('payment-orders', 'PaymentOrderController');

    // Discount Coupon
    Route::delete('discount-coupons/destroy', 'DiscountCouponController@massDestroy')->name('discount-coupons.massDestroy');
    Route::resource('discount-coupons', 'DiscountCouponController');

    // Delivery
    Route::delete('deliveries/destroy', 'DeliveryController@massDestroy')->name('deliveries.massDestroy');
    Route::post('deliveries/media', 'DeliveryController@storeMedia')->name('deliveries.storeMedia');
    Route::post('deliveries/ckmedia', 'DeliveryController@storeCKEditorImages')->name('deliveries.storeCKEditorImages');
    Route::resource('deliveries', 'DeliveryController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Setting
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingController');

    // Banner
    Route::delete('banners/destroy', 'BannerController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannerController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannerController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::post('banners/parse-csv-import', 'BannerController@parseCsvImport')->name('banners.parseCsvImport');
    Route::post('banners/process-csv-import', 'BannerController@processCsvImport')->name('banners.processCsvImport');
    Route::resource('banners', 'BannerController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Testimony
    Route::delete('testimonies/destroy', 'TestimonyController@massDestroy')->name('testimonies.massDestroy');
    Route::post('testimonies/media', 'TestimonyController@storeMedia')->name('testimonies.storeMedia');
    Route::post('testimonies/ckmedia', 'TestimonyController@storeCKEditorImages')->name('testimonies.storeCKEditorImages');
    Route::resource('testimonies', 'TestimonyController');

    // Newsletter
    Route::delete('newsletters/destroy', 'NewsletterController@massDestroy')->name('newsletters.massDestroy');
    Route::resource('newsletters', 'NewsletterController');

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnerController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});

Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});

Route::group(['namespace' => 'Site', 'as' => 'site.'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');

    // Save Newsletter
    Route::post('/saveLeadNewsletter', 'HomeController@saveLeadNewsletter')->name('home.saveLeadNewsletter');

    // Terms of use
    Route::get('/terms-of-use', 'HomeController@termsOfUse')->name('home.termsOfUse');

    // Faq
    Route::get('/perguntas-frequentes', 'HomeController@faq')->name('home.faq');

    // Products
    Route::get('/produtos/', 'ProductController@index')->name('product.index');
    Route::get('/produtos/{product:slug}', 'ProductController@show')->name('product.show');

    // Cart
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::delete('/cart', 'CartController@destroy')->name('cart.destroy');

    // Payments
    Route::get('/order/payment', 'OrderController@payment')
        ->name('order.payment')
        ->middleware(\App\Http\Middleware\HandleLinkAbandonedCartMiddleware::class);

    Route::post('/order/pay', 'OrderController@pay')->name('order.pay');
    Route::get('/order/{order}/thanks-payment', 'OrderController@thanksPayment')->name('order.thanksPayment');
});

Route::group(['namespace' => 'Site', 'as' => 'site.', 'middleware' => ['auth']], function () {
    // User Logged
    Route::get('/user', 'UserLoggedController@index')->name('user-logged.index');
    Route::get('/user/{order}/order', 'UserLoggedController@order')->name('user-logged.order');
    Route::get('/user/edit', 'UserLoggedController@editDataUser')->name('user-logged.editDataUser');
    Route::put('/user/update', 'UserLoggedController@updateDataUser')->name('user-logged.updateDataUser');
    Route::get('/user/addresses', 'UserLoggedController@addresses')->name('user-logged.addresses');
    Route::get('/user/addresses/create', 'UserLoggedController@createAddress')->name('user-logged.createAddress');
    Route::post('/user/addresses/store', 'UserLoggedController@storeAddress')->name('user-logged.storeAddress');
    Route::get('/user/addresses/{address}/edit', 'UserLoggedController@editAddress')->name('user-logged.editAddress');
    Route::put('/user/addresses/{address}/update', 'UserLoggedController@updateAddress')->name('user-logged.updateAddress');
    Route::delete('/user/addresses/{address}/destroy', 'UserLoggedController@destroyAddress')->name('user-logged.destroyAddress');
});
