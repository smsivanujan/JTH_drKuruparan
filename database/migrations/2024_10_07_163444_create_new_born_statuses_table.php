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
        Schema::create('new_born_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregnancy_id');
            $table->timestamp('baby_dob')->nullable();
            $table->string('baby_gender')->nullable();
            $table->string('apgar')->nullable();
            $table->string('nbs_birth_weight')->nullable();
            $table->string('pbu_admission')->nullable();
            $table->string('pbu_admission_i')->nullable();
            $table->timestamps();

            $table->foreign('pregnancy_id')->references('id')->on('pregnancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_born_statuses');
    }
};
