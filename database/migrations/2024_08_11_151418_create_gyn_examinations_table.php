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
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade');
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
            $table->string('inspectionGyn')->nullable();
            $table->string('percussion')->nullable();
            $table->string('auscultator')->nullable();
            $table->string('auscultation')->nullable();
            $table->string('tenderness')->nullable();
            $table->string('size')->nullable();
            $table->string('stress_incontinence')->nullable();
            $table->string('cervical')->nullable();
            $table->string('os')->nullable();
            $table->string('polyp_ulcer')->nullable();
            $table->string('cervical_motion_tenderness')->nullable();
            $table->string('adnexialmass_tas')->nullable();
            $table->string('bladder_tas')->nullable();
            $table->string('free_fluid_tas')->nullable();
            $table->string('endometrium_tvs')->nullable();
            $table->string('fiber_tvs')->nullable();
            $table->string('size_tvs')->nullable();
            $table->string('direction_tvs')->nullable();
            $table->string('polyps_tvs')->nullable();
            $table->string('echopic_tvs')->nullable();
            $table->string('adnexialmass_tvs')->nullable();
            $table->string('problist')->nullable();
            $table->string('medical_hx')->nullable();
            $table->string('surgery_hx')->nullable();
            $table->timestamps();
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
