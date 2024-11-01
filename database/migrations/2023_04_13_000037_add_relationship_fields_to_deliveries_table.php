<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDeliveriesTable extends Migration
{
    public function up()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_8326971')->references('id')->on('orders');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id', 'item_fk_8326964')->references('id')->on('item_orders');
        });
    }
}
