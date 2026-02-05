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
        Schema::table('projets', function (Blueprint $table) {
            $table->enum('category', ['IA', 'Mobile', 'Web', 'Desktop', 'Autre/ Personnel '])->default('Web')->after('description');            
            $table->enum('statut', ['En cours', 'Terminé', 'Publié'])->default('En cours')->after('category');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projets', function (Blueprint $table) {
            //
        });
    }
};
