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
        Schema::create('investigations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->string('ctg')->nullable();
            $table->string('tas')->nullable();
            $table->string('hb')->nullable();
            $table->string('plt')->nullable();
            $table->string('wbc')->nullable();
            $table->string('crp')->nullable();
            $table->string('urine_full_report')->nullable();
            $table->string('ohtt_bss')->nullable();
            $table->string('rbs')->nullable();
            $table->string('rbs_unit')->nullable();
            $table->string('fbs')->nullable();
            $table->string('fbs_unit')->nullable();
            $table->string('ppbs')->nullable();
            $table->string('ppbs_unit')->nullable();
            $table->string('scr')->nullable();
            $table->string('bun')->nullable();
            $table->string('sodium')->nullable();
            $table->string('potassium')->nullable();
            $table->string('ast')->nullable();
            $table->string('alt')->nullable();
            $table->string('pt')->nullable();
            $table->string('aptt')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigations');
    }
};
