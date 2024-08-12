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
            $table->text('general')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->float('bmi')->nullable();
            $table->float('temperature')->nullable();
            $table->text('system')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->string('rhythm')->nullable();
            $table->integer('systolic')->nullable();
            $table->integer('diastolic')->nullable();
            $table->string('heart_sound')->nullable();
            $table->string('memor')->nullable();
            $table->string('breath_sound')->nullable();
            $table->string('thyroid_examination')->nullable();
            $table->string('abd_examination')->nullable();
            $table->string('inspection')->nullable();
            $table->string('stress_incontinence')->nullable();
            $table->string('cervical')->nullable();
            $table->string('os')->nullable();
            $table->string('polyp_ulcer')->nullable();
            $table->string('cervical_motion_tenderness')->nullable();
            $table->string('direction')->nullable();
            $table->string('adnexial_mass')->nullable();
            $table->string('tas_uterus')->nullable();
            $table->string('tvs_uterus')->nullable();
            $table->string('endometrium')->nullable();
            $table->string('adnexial_mass_scan')->nullable();
            $table->text('problist')->nullable();
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
