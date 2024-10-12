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
        Schema::create('gyn_examinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->text('gyn_general')->nullable();
            $table->string('gyn_thyroid_examination')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bmi')->nullable();
            $table->string('gyn_temperature')->nullable();
            $table->string('gyn_pulse_rate')->nullable();
            $table->string('rhythm')->nullable();
            $table->string('heart_sound')->nullable();
            $table->string('murmur')->nullable();
            $table->string('gyn_systolic')->nullable();
            $table->string('gyn_diastolic')->nullable();
            $table->string('breath_sound')->nullable();
            $table->text('gyn_inspection')->nullable();
            $table->string('site_mass')->nullable();
            $table->string('size_mass')->nullable();
            $table->string('percussion_mass')->nullable();
            $table->string('auscultator_mass')->nullable();
            $table->string('palpation')->nullable();
            $table->string('percussion')->nullable();
            $table->string('auscultation')->nullable();
            $table->text('inspectionSpeculum')->nullable();
            $table->string('stress_incontinence')->nullable();
            $table->string('cervical_consistency')->nullable();
            $table->string('os')->nullable();
            $table->string('polyp_ulcer')->nullable();
            $table->string('cervical_motion_tenderness')->nullable();
            $table->string('endometrium')->nullable();
            $table->string('fibroid')->nullable();
            $table->string('size')->nullable();
            $table->string('direction')->nullable();
            $table->string('ovary')->nullable();
            $table->string('adnexialmass')->nullable();
            $table->string('bladder')->nullable();
            $table->string('free_fluid')->nullable();
            $table->string('cavity')->nullable();
            $table->string('polyps')->nullable();
            $table->string('ectopic')->nullable();
            $table->string('problist')->nullable();
            $table->string('medical_hx')->nullable();
            $table->string('surgery_hx')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyn_examinations');
    }
};
