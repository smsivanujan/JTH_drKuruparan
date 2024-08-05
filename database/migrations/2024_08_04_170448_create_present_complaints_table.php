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
        Schema::create('present_complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnanacy_id')->constrained('pregnanacies');
            $table->string('complaint'); 
            $table->string('duration'); 
            $table->string('severity'); 
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('present_complaints');
    }
};
