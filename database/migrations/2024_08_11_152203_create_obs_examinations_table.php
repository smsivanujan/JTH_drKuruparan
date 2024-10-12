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
        Schema::create('obs_examinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->text('obs_general')->nullable();
            $table->string('obs_systolic')->nullable();
            $table->string('obs_diastolic')->nullable();
            $table->string('obs_pulse_rate')->nullable();
            $table->string('obs_thyroid_examination')->nullable();
            $table->string('obs_inspection')->nullable();
            $table->string('sfh')->nullable();
            $table->string('lie')->nullable();
            $table->string('position')->nullable();
            $table->string('engagement')->nullable();
            $table->string('fhs')->nullable();
            $table->string('cervical_dilatation')->nullable();
            $table->string('cervical_consistency')->nullable();
            $table->string('cervical_canel')->nullable();
            $table->string('cervical_position')->nullable();
            $table->string('station')->nullable();
            $table->string('fetus')->nullable();
            $table->string('presentation')->nullable();
            $table->string('bpd')->nullable();
            $table->string('ac')->nullable();
            $table->string('hc')->nullable();
            $table->string('fl')->nullable();
            $table->string('placental_position')->nullable();
            $table->string('efw')->nullable();
            $table->string('liquor')->nullable();
            $table->string('dopplier')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obs_examinations');
    }
};
