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
        Schema::create('dhikrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adhkar_category_id')->constrained()->cascadeOnDelete();
            $table->json('text'); // Translatable
            $table->json('translation')->nullable(); // Translatable
            $table->integer('count')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dhikrs');
    }
};
