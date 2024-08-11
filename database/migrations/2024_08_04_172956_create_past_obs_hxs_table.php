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
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade');
            $table->integer('year')->nullable();
            $table->string('poa')->nullable(); // Place of Admission or Point of Care, clarify as needed
            $table->string('mod')->nullable(); // Mode of Delivery or other, clarify as needed
            $table->string('birth_weight')->nullable(); // Birth weight of the previous child
            $table->text('remarks')->nullable(); // Additional remarks
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
