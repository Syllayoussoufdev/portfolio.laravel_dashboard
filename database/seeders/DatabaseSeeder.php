<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competence;
use App\Models\Diplome;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Diplome::factory()->count(10)->create();

        $ids = range(1, 10);

    Competence::factory()->count(40)->create()->each(function ($competence) use($ids) {
        shuffle($ids);
        $competence->categories()->attach(array_slice($ids, 0, rand(1, 4)));
    });   // Ajout de 5 diplômes     

    }
}
