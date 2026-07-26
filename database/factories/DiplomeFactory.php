<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Diplome;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diplome>
 */
class DiplomeFactory extends Factory
{
    protected $model = Diplome::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Associe chaque diplôme à un utilisateur
            'nom_diplome' =>  $this->faker->sentence(3), // Génère un nom de diplôme aléatoire
            'annee_obtention' => $this->faker->year(), // Génère une année d'obtention aléatoire
            'type_diplome' => $this->faker->randomElement(['Licence', 'Master', 'Doctorat','Certificat', 'Autre']), // Choix aléatoire parmi les types de diplômes
            'annee_obtention' => $this->faker->year(), // Génère une année d'obtention aléatoire
            'centre_formateur' => $this->faker->company(), // Génère un nom de centre de formation aléatoire
            'niveau_diplome' => $this->faker->randomElement(['Bac+2', 'Bac+3', 'Bac+5']), // Choix aléatoire parmi les niveaux de diplômes
            'domaine_etude' => $this->faker->word(), // Génère un domaine d'étude aléatoire
            'description' => $this->faker->paragraph(), // Génère une description aléatoire

        ];
    }
}
