<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
           
            if (!Schema::hasColumn('menu_items', 'main_image')) {
                $table->string('main_image')->nullable()->after('category_id');
            }

            
            if (!Schema::hasColumn('menu_items', 'gallery_images')) {
                $table->json('gallery_images')->nullable()->after('main_image');
            }

           
            if (Schema::hasColumn('menu_items', 'gallery_image1')) {
                $table->dropColumn('gallery_image1');
            }
            if (Schema::hasColumn('menu_items', 'gallery_image2')) {
                $table->dropColumn('gallery_image2');
            }
        });
    }
};
