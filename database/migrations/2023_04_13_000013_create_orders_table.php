<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->string('payment_method');
            $table->string('payment_status')->nullable();
            $table->string('gateway')->default('asaas')->nullable();
            $table->json('response_gateway')->nullable();
            $table->string('external_identification')->after('gateway');
            $table->string('external_url')->after('external_identification')->nullable();
            $table->longText('response_gateway')->after('external_identification')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
