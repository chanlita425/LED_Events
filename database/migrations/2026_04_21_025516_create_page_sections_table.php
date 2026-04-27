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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();

            $table->string('page');

            $table->string('section_key');

            $table->string('title_en')->nullable();
            $table->string('title_km')->nullable();

            $table->string('subtitle_en')->nullable();
            $table->string('subtitle_km')->nullable();

            $table->text('description_en')->nullable();
            $table->text('description_km')->nullable();

            $table->string('button_text_en')->nullable();
            $table->string('button_text_km')->nullable();

            $table->string('button_link_en')->nullable();
            $table->string('button_link_km')->nullable();

            $table->string('media_type')->nullable();
            $table->string('media_url')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
