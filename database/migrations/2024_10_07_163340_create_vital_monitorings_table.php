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
        Schema::create('vital_monitorings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->string('vm_systolic')->nullable();
            $table->string('vm_diastolic')->nullable();
            $table->string('vm_pulse_rate')->nullable();
            $table->string('vm_temperature')->nullable();
            $table->string('pph')->nullable();
            $table->string('pph_i')->nullable();
            $table->string('htn')->nullable();
            $table->string('htn_i')->nullable();
            $table->string('pp_psychosis_depressional')->nullable();
            $table->string('pp_psychosis_depressional_i')->nullable();
            $table->string('pp_sepsis')->nullable();
            $table->string('pp_sepsis_i')->nullable();
            $table->string('dvt')->nullable();
            $table->string('dvt_i')->nullable();
            $table->string('icu_admission')->nullable();
            $table->string('icu_admission_i')->nullable();
            $table->string('icu_admission_mx')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vital_monitorings');
    }
};
