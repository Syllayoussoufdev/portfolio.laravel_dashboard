<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Competence;
use faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competence>
 */
class CompetenceFactory extends Factory
{
    protected $model = Competence::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Simuler des noms de compétences aléatoires
            'nom' => $this->faker->unique()->word().' Dev',
            // Niveau de compétence entre 1 et 10
            'niveau' => $this->faker->numberBetween(1, 10),
            // Pourcentage de maîtrise entre 10 et 100
            'pourcentage' => $this->faker->numberBetween(10, 100),
        ];
    }
}
