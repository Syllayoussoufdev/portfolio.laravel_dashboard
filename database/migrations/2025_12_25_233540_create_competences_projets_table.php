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
        Schema::create('competence_projet', function (Blueprint $table) {
            
            // Utilise foreignId au lieu de foreign
            $table->foreignId('competence_id')
                ->constrained('competences') // Laravel devine tout seul qu'il pointe sur 'id'
                ->onDelete('cascade')
                ->onUpdate('cascade');
                        
            $table->foreignId('projet_id')
                ->constrained('projets')
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
        Schema::dropIfExists('competence_projet');
    }
};
