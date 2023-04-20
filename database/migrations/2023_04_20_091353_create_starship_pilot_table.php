<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('starship_pilot', function (Blueprint $table) {
            $table->foreignId('starship_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pilot_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('starship_pilot');
    }
};
