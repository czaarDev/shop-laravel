<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('discount_coupon_product', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\DiscountCoupon::class)->index()->constrained();
            $table->foreignIdFor(\App\Models\Product::class)->index()->constrained();
        });
    }

};
