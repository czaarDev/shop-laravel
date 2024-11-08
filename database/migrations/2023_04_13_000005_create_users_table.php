<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('document_number')->nullable()->unique();
            $table->date('birth_date')->nullable();
            $table->string('phone_number')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('two_factor')->default(0)->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('two_factor_code')->nullable();
            $table->string('remember_token')->nullable();
            $table->datetime('two_factor_expires_at')->nullable();
            $table->string('social_driver')->nullable();
            $table->string('social_driver_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
