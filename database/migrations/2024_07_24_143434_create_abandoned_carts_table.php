<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('abandoned_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Order::class)->index()->nullable()->constrained();
            $table->foreignIdFor(\App\Models\Product::class)->index()->nullable()->constrained();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->decimal('amount');
            $table->string('payment_method')->nullable();
            $table->string('status')->default('pending');
            $table->json('infosProduct');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abandoned_carts');
    }
};
