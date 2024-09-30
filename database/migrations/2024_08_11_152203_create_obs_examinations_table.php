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
            $table->text('generalObs')->nullable();
            $table->integer('bp')->nullable();
            $table->integer('pr')->nullable();
            $table->string('thyroid_examinationObs')->nullable();
            $table->string('inspectionObs')->nullable();
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
