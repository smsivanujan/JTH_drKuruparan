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
            $table->integer('age');
            $table->string('amount')->nullable();
            $table->string('duration')->nullable();
            $table->string('status');
            $table->string('aub'); // Abnormal Uterine Bleeding
            $table->json('contraception')->nullable(); // Contraceptive methods
            $table->string('subfertility'); // If applicable, could be nullable
            $table->string('gender')->nullable(); // Gender of the patient or related detail
            $table->json('male_factors')->nullable(); // Male infertility factors
            $table->json('ovulatory_disorder')->nullable(); // Ovulatory disorders
            $table->json('tubal_factors')->nullable(); // Tubal factors affecting fertility
            $table->json('uterine_factors')->nullable(); // Uterine factors affecting fertility
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
