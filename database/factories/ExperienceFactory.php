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
            // Simuler des postes aléatoires
            'poste' => $this->faker->jobTitle(),
            // Simuler des noms d'entreprises aléatoires
            'entreprise' => $this->faker->company(),
            // Dates de début et de fin aléatoires
            'date_debut' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'date_fin' => $this->faker->dateTimeBetween('-2', 'now')->format('Y-m-d'),
            // Description de l'expérience
            'description' => $this->faker->paragraph(2, true),
        ];
    }
}
