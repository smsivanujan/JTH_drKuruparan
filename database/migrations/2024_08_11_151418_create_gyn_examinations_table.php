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
        
            // General
            $table->text('general')->nullable();
        
            // Measurements
            $table->integer('height')->nullable(); // Use integer for height
            $table->integer('weight')->nullable(); // Use integer for weight
            $table->float('bmi')->nullable(); // Use float for BMI
            $table->float('temperature')->nullable(); // Use float for temperature
        
            // System
            $table->text('system')->nullable();
        
            // CVS
            $table->string('pulse_rate')->nullable();
            $table->string('rhythm')->nullable();
            $table->integer('systolic')->nullable();
            $table->integer('diastolic')->nullable();
            $table->string('heart_sound')->nullable();
            $table->string('memor')->nullable();
        
            // RS
            $table->string('breath_sound')->nullable();
        
            // Thyroid Examination
            $table->string('thyroid_examination')->nullable();
        
            // ABD Examination
            $table->string('abd_examination')->nullable();
        
            // Pelvic Examination
            $table->string('inspection')->nullable();
            $table->string('stress_incontinence')->nullable();
        
            // Bimanual VE
            $table->string('cervical')->nullable();
            $table->string('os')->nullable();
            $table->string('polyp_ulcer')->nullable();
            $table->string('cervical_motion_tenderness')->nullable();
        
            // Uterus
            $table->string('direction')->nullable();
            $table->string('adnexial_mass')->nullable();
        
            // Scan
            $table->string('tas_uterus')->nullable();
            $table->string('tvs_uterus')->nullable();
            $table->string('endometrium')->nullable();
            $table->string('adnexial_mass_scan')->nullable();
        
            // Problist
            $table->text('problist')->nullable();
        
            // Medical HX
            $table->string('medical_hx')->nullable();
        
            // Surgery HX
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
