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
            $table->text('contraception')->nullable();
            $table->string('amount')->nullable();
            $table->string('duration')->nullable();
            $table->string('regularity');
            $table->string('aub');
         
            $table->string('subfertility');
            $table->string('gender')->nullable();
            $table->text('male_factors')->nullable();
            $table->text('ovulatory_disorder')->nullable();
            $table->text('tubal_factors')->nullable();
            $table->text('uterine_factors')->nullable();
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
