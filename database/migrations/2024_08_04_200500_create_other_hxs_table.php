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
        Schema::create('other_hxs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnanacy_id')->constrained('pregnanacies');
            $table->text('drugalergyhx')->nullable();
            $table->text('food_allergy_hx')->nullable();
            $table->text('past_surgery_hx')->nullable();
            $table->text('family_hx')->nullable();
            $table->text('social_hx')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_hxs');
    }
};
