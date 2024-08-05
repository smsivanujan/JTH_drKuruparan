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
        Schema::create('past_gyn_hxs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnanacy_id')->constrained('pregnanacies');
            $table->integer('age');
            $table->string('amount')->nullable();
            $table->string('duration')->nullable();
            $table->string('status');
            $table->string('aub');
            $table->json('contraception')->nullable();
            $table->string('subfertility');
            $table->string('gender')->nullable();
            $table->json('male_factors')->nullable();
            $table->json('ovulatory_disorder')->nullable();
            $table->json('tubal_factors')->nullable();
            $table->json('uterine_factors')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_gyn_hxs');
    }
};
