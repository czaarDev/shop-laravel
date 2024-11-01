<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('type')
                ->default(\App\Enums\TypeBannerEnum::HIGHLIGHT->name)
                ->index();
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }

};
