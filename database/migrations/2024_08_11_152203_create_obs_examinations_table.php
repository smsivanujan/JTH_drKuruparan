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
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade');
            $table->text('general')->nullable();
            $table->integer('bp')->nullable();
            $table->integer('pr')->nullable();
            $table->string('thyroid_examination')->nullable();
            $table->string('inspection')->nullable();
            $table->float('sfh')->nullable();
            $table->string('precentation')->nullable();
            $table->string('lie')->nullable();
            $table->string('position')->nullable();
            $table->float('efw')->nullable();
            $table->string('engagement')->nullable();
            $table->string('liquor')->nullable();
            $table->string('fhs')->nullable();
            $table->float('cervical_dilatation')->nullable();
            $table->float('effacement')->nullable();
            $table->string('station')->nullable();
            $table->string('cervical_consistency')->nullable();
            $table->string('cervical_position')->nullable();
            $table->string('ctg')->nullable();
            $table->text('tas')->nullable();
            $table->float('hb')->nullable();
            $table->float('plt')->nullable();
            $table->float('wbc')->nullable();
            $table->float('crp')->nullable();
            $table->string('urine_full_report')->nullable();
            $table->string('ohtt_bss')->nullable();
            $table->string('antibiotics')->nullable();
            $table->string('plan_delivery')->nullable();
            $table->timestamps();
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
