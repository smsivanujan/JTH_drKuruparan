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
        Schema::create('socials_hxs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade');
            $table->string('family_status')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('patient_education')->nullable();
            $table->string('patient_occupation')->nullable();
            $table->text('patient_social_problem')->nullable();
            $table->string('partner_education')->nullable();
            $table->string('partner_occupation')->nullable();
            $table->text('partner_social_problem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socials_hxs');
    }
};