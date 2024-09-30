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
            $table->text('generalGyn')->nullable();
            $table->string('thyroid_examinationGyn')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->float('bmi')->nullable();
            $table->float('temperature')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->string('rhythm')->nullable();
            $table->string('heart_sound')->nullable();
            $table->string('murmur')->nullable();
            $table->integer('systolic')->nullable();
            $table->integer('diastolic')->nullable();
            $table->string('breath_sound')->nullable();
            $table->text('inspectionGyn')->nullable();

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
            $table->string('endometrium_tas')->nullable();
            $table->string('fibroid_tas')->nullable();
            $table->string('size_tas')->nullable();
            $table->string('direction_tas')->nullable();
            $table->string('ovary_tas')->nullable();
            $table->string('adnexialmass_tas')->nullable();
            $table->string('bladder_tas')->nullable();
            $table->string('free_fluid_tas')->nullable();
            $table->string('endometrium_tvs')->nullable();
            $table->string('fibroid_tvs')->nullable();
            $table->string('size_tvs')->nullable();
            $table->string('direction_tvs')->nullable();
            $table->string('cavity_tas')->nullable();
            $table->string('polyps_tvs')->nullable();
            $table->string('ectopic_tvs')->nullable();
            $table->string('adnexialmass_tvs')->nullable();
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
