<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->longText('description')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('type');
            $table->integer('quantity')->nullable();
            $table->datetime('start_at');
            $table->datetime('end_at');
            $table->boolean('is_direct_payment')->default(0);
            $table->boolean('is_active')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discount_coupons');
    }
};
