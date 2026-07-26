<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Competence;

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
            'user_id' => \App\Models\User::factory(), // Associe chaque compétence à un utilisateur si non spécifié
            // Simuler des noms de compétences aléatoires
            'nom_competence' => $this->faker->word(),
            // Niveau de compétence entre 1 et 10
            'niveau' => $this->faker->numberBetween(1, 10),
            // Pourcentage de maîtrise entre 10 et 100
            'pourcentage' => $this->faker->numberBetween(10, 100),
            // Catégorie de compétence
            'category' => $this->faker->randomElement(['Professionnelle', 'Language', 'Informatiques', 'Soft Skills']),
            // Type de compétence
            'type' => $this->faker->randomElement(['Back-end', 'Front-end', 'Full-stack', 'Mobile', 'Autre']),
            // Description aléatoire
            'description' => $this->faker->sentence(),
            // Icone aléatoire (exemple de classes FontAwesome)
            'icon' => $this->faker->word(),
        ];
    }
}
