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
            $table->text('ctg')->nullable();
            $table->text('tas')->nullable();
            $table->text('hb')->nullable();
            $table->text('plt')->nullable();
            $table->text('wbc')->nullable();
            $table->text('crp')->nullable(); 
            $table->text('urine_full_report')->nullable();
            $table->text('ohtt_bss')->nullable();
            $table->text('antibiotics')->nullable();
            $table->text('plan_delivery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
