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
        Schema::create('tutor_rate_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->constrained();
            $table->decimal('old_hourly_rate', 8, 2);
            $table->decimal('new_hourly_rate', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_rate_changes');
    }
};
