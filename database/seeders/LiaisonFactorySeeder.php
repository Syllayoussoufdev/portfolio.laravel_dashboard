<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Diplome; // Assurez-vous d'importer les modèles nécessaires
use App\Models\Competence;

class LiaisonFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. DÉSACTIVER la vérification des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider les tables pour un seeder propre
        DB::table('diplomes')->truncate(); 
        DB::table('competences')->truncate();
        DB::table('diplome_competence')->truncate();

        // 3. RÉACTIVER la vérification des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        competence::factory()->count(10)->create(); // Ajout de 20 compétences

        // 2. Récupérer tous les IDs de Compétences (pour la liaison)
        // La méthode pluck('id') est très efficace pour récupérer une seule colonne
        $idsCompetences = competence::all()->pluck('id')->toArray();// Récupère tous les IDs des compétences quon vient de creer sous forme de tableau
        
        // 3. Créer 10 Diplômes et les lier aux Compétences avec un niveau de maîtrise aléatoire
        //each permet de parcourir chaque diplôme créé et use pour la liaison des variables externes

        Diplome::factory()->count(8)->create()->each(function($diplome) use ($idsCompetences) {
            // Mélanger les IDs de compétences pour une sélection aléatoire
            shuffle($idsCompetences);
            // Attacher un nombre aléatoire de compétences (entre 1 et 5) à chaque diplôme
            $diplome->competence()->attach(array_slice($idsCompetences, 0, rand(1, 5)),);
        });
    }
}
