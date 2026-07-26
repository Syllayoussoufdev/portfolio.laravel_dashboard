<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Diplome;
use App\Models\Competence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🚨 IMPORTANT : N'appelez QUE le Seeder qui contient la logique
        // de création et de liaison (votre code d'adaptation)
        $this->call([
            \Database\Seeders\UserSeeder::class,
            \Database\Seeders\CompetenceSeeder::class,
            \Database\Seeders\DiplomeSeeder::class,
            \Database\Seeders\ExperienceSeeder::class,
            \Database\Seeders\ProjetSeeder::class,
            \Database\Seeders\LiaisonFactorySeeder::class,
            \Database\Seeders\LiaisonFactorySeeder::class,
            // Vous pouvez laisser les autres seeders commentés ou les supprimer si vous n'en avez pas besoin /

        ]);
        $this->command->info('seeders User executed successfully.');
    }
}
