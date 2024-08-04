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
        Schema::create('pregnanacies', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('category');
            $table->foreignId('present_complaint_id')->constrained('present_complaints');
            $table->foreignId('current_pregnancy_hx_id')->constrained('current_pregnancy_hxs');
            $table->foreignId('past_obs_hx_id')->constrained('past_obs_hxs');
            $table->foreignId('past_gyn_hx_id')->constrained('past_gyn_hxs');
            $table->foreignId('past_med_hx_id')->constrained('past_med_hxs');
            $table->foreignId('other_hx_id')->constrained('other_hxs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregnanacies');
    }
};
