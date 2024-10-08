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
        Schema::create('summeries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->text('summery')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summeries');
    }
};
