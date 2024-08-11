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
            $table->id(); // Primary key
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade'); // Foreign key referencing pregnancies table
            $table->json('drugalergyhx')->nullable(); // Store array as JSON
            $table->string('foodallergyhx')->nullable(); // Food allergy history
            $table->string('otherallergyhx')->nullable(); // Other allergy history
            $table->timestamps(); // Timestamps for created_at and updated_at
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
