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
            $table->integer('obs_systolic')->nullable();
            $table->integer('obs_diastolic')->nullable();
            $table->integer('obs_pulse_rate')->nullable();
            $table->string('obs_thyroid_examination')->nullable();
            $table->string('obs_inspection')->nullable();
            $table->float('sfh')->nullable();
            $table->string('lie')->nullable();
            $table->string('position')->nullable();
            $table->string('engagement')->nullable();
            $table->string('fhs')->nullable();
            $table->float('cervical_dilatation')->nullable();
            $table->string('cervical_consistency')->nullable();
            $table->string('cervical_canel')->nullable();
            $table->string('cervical_position')->nullable();
            $table->string('station')->nullable();
            $table->string('fetus')->nullable();
            $table->string('precentation')->nullable();
            $table->float('bpd')->nullable();
            $table->float('ac')->nullable();
            $table->float('hc')->nullable();
            $table->float('fl')->nullable();
            $table->float('crl')->nullable();
            $table->float('placental_position')->nullable();
            $table->float('efw')->nullable();
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
