<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Diplome;
use faker\Generator as Faker;

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
            // Simuler des noms de diplômes aléatoires
            //unique() sert à éviter les doublons sentences de 3 mots / randomElement pour choisir un type de diplôme au hasard
            'Titre' => $this->faker->unique()->sentence(3, true) . ' (' . $this->faker->randomElement(['Licence', 'Master', 'BTS']) . ')',
            // Année aléatoire entre 2010 et 2023
            'Annee_obtention' => $this->faker->numberBetween(2010, 2023),
            // Centre formateur aléatoire
            'Centre_formateur' => $this->faker->company(),
            //lieu de formation dans une des villes proposées
            'Lieu_centre' => $this->faker-> randomElement(['Paris', 'Lyon', 'Marseille', 'Toulouse', 'Bordeaux', 'Nice']),

            // Correction de la méthode Faker
            // Ajout du champ manquant
            'niveau_diplome' => $this->faker->randomElement(['Bac+2', 'Bac+3', 'Bac+5']),
            'Domaine_etude' => $this->faker->jobTitle(), 
            'Description' => $this->faker->paragraph(),
            

        ];
    }
}
