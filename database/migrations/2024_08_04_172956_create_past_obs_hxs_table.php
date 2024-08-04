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
        Schema::create('past_obs_hxs', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->nullable();
            $table->string('poa')->nullable();
            $table->string('mod')->nullable();
            $table->string('birth_weight')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_obs_hxs');
    }
};
