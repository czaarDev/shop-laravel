<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->date('start_at');
            $table->date('end_at');
            $table->integer('position');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
