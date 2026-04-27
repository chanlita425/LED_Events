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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();

            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('working_hours')->nullable();

            $table->timestamps(); // ✅ recommended for CMS
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_infos'); // ✅ MATCH
    }

};
