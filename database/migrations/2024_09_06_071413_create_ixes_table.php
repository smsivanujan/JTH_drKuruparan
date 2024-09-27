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
        Schema::create('ixs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade');
            $table->string('ctg')->nullable();
            $table->string('tas')->nullable();
            $table->string('hb')->nullable();
            $table->string('plt')->nullable();
            $table->string('wbc')->nullable();
            $table->string('crp')->nullable(); 
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
        Schema::dropIfExists('ixes');
    }
};
