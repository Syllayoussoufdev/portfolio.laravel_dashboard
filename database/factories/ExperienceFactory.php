<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Experience;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    protected $model = Experience::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //definition des données factices qui serons dans le modèle Experience
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Associe chaque expérience à un utilisateur
            'poste' => $this->faker->jobTitle(),
            'entreprise' =>  $this->faker->company(),
            'Adresse_entreprise' => $this->faker->address(),
            'periode' => $this->faker->date(),
            'type_contrat' => $this->faker->randomElement(['CDD', 'CDI', 'Stage', 'Freelance']),
            'secteur_activite' => $this->faker->word(),
            'realisation_principale' => $this->faker->paragraph(),
            // 'equipe_geree',
            'projet_principal' => $this->faker->sentence(),
            'resultats_obtenus' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph()
        ];
    }
}
