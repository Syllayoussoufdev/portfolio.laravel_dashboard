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
        Schema::create('diplome_competence', function (Blueprint $table) {
            $table->id();
            $table->string('niveau_maitrise')->nullable();

            $table->foreignId('diplome_id')
                ->constrained('diplomes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('competence_id')
                ->constrained('competences')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplome_competence');
    }
};
