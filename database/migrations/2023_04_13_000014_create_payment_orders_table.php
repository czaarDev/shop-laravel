<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('payment_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_method');
            $table->integer('amount');
            $table->string('payment_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
