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
        Schema::create('family_hxs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->string('medical_diseases')->nullable();
            $table->string('ovarian')->nullable();
            $table->string('breast')->nullable();
            $table->string('endometrial')->nullable();
            $table->string('cervical')->nullable();
            $table->string('colonic')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_hxs');
    }
};
