<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewslettersTable extends Migration
{
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('interest')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
