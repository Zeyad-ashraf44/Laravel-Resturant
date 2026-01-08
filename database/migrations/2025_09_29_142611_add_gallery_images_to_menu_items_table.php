<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('menu_items', function (Blueprint $table) {
        if (!Schema::hasColumn('menu_items', 'gallery_images')) {
            $table->text('gallery_images')->nullable()->after('main_image');
        }
    });
}

public function down(): void
{
    Schema::table('menu_items', function (Blueprint $table) {
        $table->dropColumn('gallery_images');
    });
}
};
