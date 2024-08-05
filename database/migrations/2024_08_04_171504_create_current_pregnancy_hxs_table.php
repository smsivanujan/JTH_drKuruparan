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
        Schema::create('current_pregnancy_hxs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnanacy_id')->constrained('pregnanacies');
            $table->string('g')->nullable(); 
            $table->string('p')->nullable(); 
            $table->string('c')->nullable();
            $table->integer('married_year')->nullable();
            $table->date('lmp')->nullable();
            $table->date('edd')->nullable();
            $table->date('working_edd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_pregnancy_hxs');
    }
};
