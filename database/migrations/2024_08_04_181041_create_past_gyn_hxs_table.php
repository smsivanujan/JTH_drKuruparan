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
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade');
            $table->integer('menarche_at');
            $table->string('amount')->nullable();
            $table->string('duration')->nullable();
            $table->string('status');
            $table->string('aub');
            $table->string('contraception')->nullable();
            $table->string('subfertility');
            $table->string('gender')->nullable();
            $table->string('male_factors')->nullable();
            $table->string('ovulatory_disorder')->nullable();
            $table->string('tubal_factors')->nullable();
            $table->string('uterine_factors')->nullable();
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
