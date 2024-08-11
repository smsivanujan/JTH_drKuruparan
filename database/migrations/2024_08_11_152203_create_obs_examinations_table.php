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
        Schema::create('obs_examinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id')->constrained('pregnanacies')->onDelete('cascade');
            $table->boolean('pallor')->nullable();
            $table->boolean('odema')->nullable();
            $table->integer('bp')->nullable();
            $table->integer('pr')->nullable();
            $table->enum('thyroid_examination', ['Enlarged', 'Not Enlarged'])->nullable();
            $table->enum('inspection', ['Linea nigra', 'Striae', 'Flat Umblicus', 'Surgical Scar'])->nullable();
            $table->float('sfh')->nullable();
            $table->enum('precentation', ['Cephalic P/C', 'Breech P/C'])->nullable();
            $table->enum('lie', ['Longitudinal', 'Transverse', 'Oblique'])->nullable();
            $table->enum('position', ['LOA', 'LOP', 'Others'])->nullable();
            $table->float('efw')->nullable();
            $table->enum('engagement', ['Engaged', 'Not Engaged'])->nullable();
            $table->enum('liquor', ['Adequate', 'Not Adequate'])->nullable();
            $table->enum('fhs', ['Present', 'Absent'])->nullable();
            $table->float('cervical_dilatation')->nullable();
            $table->float('effacement')->nullable();
            $table->enum('station', ['-2', '-1', '0', '+1', '+2'])->nullable();
            $table->enum('cervical_consistency', ['Firm', 'Soft'])->nullable();
            $table->enum('cervical_position', ['Anterior', 'Posterior', 'Central'])->nullable();
            $table->enum('ctg', ['Normal', 'Suspicious', 'Pathological'])->nullable();
            $table->text('tas')->nullable();
            $table->float('hb')->nullable();
            $table->float('plt')->nullable();
            $table->float('wbc')->nullable();
            $table->float('crp')->nullable();
            $table->enum('urine_full_report', ['Normal', 'Abnormal'])->nullable();
            $table->enum('ohtt_bss', ['Normal', 'Abnormal'])->nullable();
            $table->enum('antibiotics', ['Antibiotics', 'Analgesics', 'DM Mx', 'BP Mx', 'Steroids'])->nullable();
            $table->enum('plan_delivery', ['IOC', 'SOS', 'ELEC.LSCS'])->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obs_examinations');
    }
};
