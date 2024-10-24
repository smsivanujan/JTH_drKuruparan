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
        Schema::create('past_gyn_hxs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->integer('menarche_at')->nullable();
            $table->string('contraception')->nullable();
            $table->string('amount')->nullable();
            $table->string('PGHx_duration')->nullable();
            $table->string('regularity')->nullable();
            $table->string('aub')->nullable();
            $table->string('subfertility')->nullable();
            $table->string('gender')->nullable();
            $table->string('male_factors')->nullable();
            $table->string('ovulatory_disorder')->nullable();
            $table->string('tubal_factors')->nullable();
            $table->string('uterine_factors')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_gyn_hxs');
    }
};
