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
        Schema::create('allergic_hxs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade');
            $table->string('drugalergyhx')->nullable();
            $table->string('foodallergyhx')->nullable();
            $table->string('otherallergyhx')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergic_hxs');
    }
};
