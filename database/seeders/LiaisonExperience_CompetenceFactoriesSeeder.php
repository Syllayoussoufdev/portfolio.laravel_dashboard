<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Experience; // Assurez-vous d'importer les modèles nécessaires
use App\Models\Competence;

class LiaisonExperience_CompetenceFactoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. DÉSACTIVER la vérification des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider les tables pour un seeder propre
        DB::table('experiences')->truncate();
        DB::table('experience_competence')->truncate();
        // 3. RÉACTIVER la vérification des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $idsCompetences = competence::all()->pluck('id')->toArray();// Récupère tous les IDs des compétences deja existante sous forme de tableau
        // 3. Créer 10 Experiences et les lier aux Compétences
        
        Experience::factory()->count(10)->create()->each(function($experience) use ($idsCompetences) {
            // Mélanger les IDs de compétences pour une sélection aléatoire
            shuffle($idsCompetences);
            // Attacher un nombre aléatoire de compétences (entre 1 et 5) à chaque expérience
            $experience->competence()->attach(array_slice($idsCompetences, 0, rand(1, 5)),);
        });



    }
}
