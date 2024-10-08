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
        Schema::create('social_hxs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->string('family_status')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('patient_education')->nullable();
            $table->string('patient_occupation')->nullable();
            $table->text('patient_social_problem')->nullable();
            $table->string('partner_education')->nullable();
            $table->string('partner_occupation')->nullable();
            $table->text('partner_social_problem')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_hxs');
    }
};
