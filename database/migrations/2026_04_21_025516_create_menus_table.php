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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->foreignId('menu_group_id')->nullable()->constrained('menu_groups')->nullOnDelete();

            $table->string('slug');
            $table->string('route')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);

            $table->string('name_en');
            $table->string('name_km');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
