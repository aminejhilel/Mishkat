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
        Schema::create('islamic_events', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // Translatable
            $table->json('description')->nullable(); // Translatable
            $table->date('hijri_date')->nullable();
            $table->date('gregorian_date')->nullable();
            $table->boolean('is_recurring')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islamic_events');
    }
};
