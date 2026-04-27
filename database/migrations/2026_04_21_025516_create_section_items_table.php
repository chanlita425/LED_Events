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
        Schema::create('section_items', function (Blueprint $table) {
            $table->id();

            $table->string('section_key');
            $table->string('component_type')->nullable();
            $table->string('group_title')->nullable();
            $table->string('page')->nullable();

            $table->string('title_en')->nullable();
            $table->string('title_km')->nullable();

            $table->text('description_en')->nullable();
            $table->text('description_km')->nullable();

            $table->string('image')->nullable();
            $table->string('icon')->nullable();

            $table->string('link')->nullable();

            $table->string('button_text_en')->nullable();
            $table->string('button_text_km')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);

            $table->string('type')->nullable();
            $table->json('meta')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_items');
    }
};
