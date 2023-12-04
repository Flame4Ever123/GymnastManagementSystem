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
        Schema::create('gymnast_competition_has_apparatuses', function (Blueprint $table) {
            $table->id();
            $table->integer('gymnast_competition_id');
            $table->string('apparatus');
            $table->integer('apparatus_ranking');
            $table->decimal('apparatus_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gymnast_competition_has_apparatuses');
    }
};
