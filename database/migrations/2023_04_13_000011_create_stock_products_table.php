<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockProductsTable extends Migration
{
    public function up()
    {
        Schema::create('stock_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
