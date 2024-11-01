<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItemOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('item_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_8326902')->references('id')->on('products');

            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_8326902')->references('id')->on('orders');
        });
    }
}
