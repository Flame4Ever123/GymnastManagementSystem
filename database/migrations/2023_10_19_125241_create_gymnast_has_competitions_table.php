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
        Schema::create('gymnast_has_competitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('gymnast_id');
            $table->string('competition_category');
            $table->integer('total_ranking');
            $table->decimal('total_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gymnast_has_competitions');
    }
};
