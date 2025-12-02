<?php

namespace Database\Seeders;

use App\Models\User;
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
            \Database\Seeders\LiaisonFactorySeeder::class,
            // Vous pouvez laisser les autres vides, mais ne les appelez plus ici
        ]);
        
        // Si vous avez un utilisateur Admin critique, appelez son Seeder ici aussi.
        // $this->call(UserSeeder::class);
    }
}
