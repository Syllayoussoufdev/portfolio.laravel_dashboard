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
            'name' => $this->faker->unique()->sentence(3, true) . ' (' . $this->faker->randomElement(['Licence', 'Master', 'BTS']) . ')',
            // Année aléatoire entre 2010 et 2023
            'annee' => $this->faker->numberBetween(2010, 2023),
        ];
    }
}
