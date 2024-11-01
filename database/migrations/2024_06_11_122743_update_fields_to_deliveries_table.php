<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->dropColumn(['quantity', 'type']);
            $table->dropForeign('item_fk_8326964');
            $table->dropIndex('item_fk_8326964');
            $table->dropColumn('item_id');
            $table->string('status')->default(\App\Enums\StatusDeliveryOrderEnum::PENDING->value);
            $table->string('link')->nullable();
        });
    }
};
