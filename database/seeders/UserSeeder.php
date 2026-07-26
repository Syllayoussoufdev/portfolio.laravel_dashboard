<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer des utilisateurs spécifiques avec des données définies

        User::factory()->create([
            'name' => 'Sylla Youssouf',
            'email' => 'sylla@gmail.com',
            'password' => bcrypt('Sly1209'),
            'titre_professionnel' => 'Développeur Web & Mobile Junior — PHP · Laravel · JavaScript · React',
            'slug' => 'deveweb_laraveel_junior', // Slug personnalisé pour cet utilisateur
            'biographie' => 'Passionné de développement web avec une expérience dans Laravel.',
            'photo_profil' => 'assets/images/profil3.png',
            'a_propos' => 'Jeune diplômé d\'un BTS en Informatique Développeur d\'Applications, j\'ai travaillé sur plusieurs projets en PHP, Laravel, MySQL, HTML, CSS, JavaScript et Bootstrap. J\'ai également une initiation en React.js et Flutter/Dart. Passionné par l\'innovation digitale et les outils no-code, j\'ai aussi une expérience en support technique, formation et documentation. Je suis à la recherche d\'une opportunité pour mettre en pratique mes compétences et continuer à apprendre dans un environnement stimulant.',
            'cv' => 'https://drive.google.com/file/d/1PcR6cYPK84EICsSl4zzhgcmeJ7sJbkBd/view?usp=drive_link',
            'role' => 'user',
        ]);

        // Optionnel : Créer un utilisateur spécifique (ex: Admin)
        User::factory()->create([
            'name' => 'Sylla Admin',
            'email' => 'syllaadmin@gmail.com',
            'password' => bcrypt('Sly1209'),
            'titre_professionnel' => 'Administrateur Système',
            'slug' => 'administrateur-systeme',
            'biographie' => 'Administrateur principal de l\'application.',
            'photo_profil' => 'assets/images/profil1.png',
            'cv' => 'https://example.com/cv_admin.pdf',
            'role' => 'admin',
            'a_propos' => 'En tant qu\'administrateur, je suis responsable de la gestion et de la maintenance de l\'application, assurant son bon fonctionnement et sa sécurité. Avec une solide expérience en administration système et en gestion de bases de données, je veille à ce que les utilisateurs aient une expérience fluide et sécurisée sur notre plateforme.',
        ]);

        // Créer des utilisateurs aléatoires
        User::factory()->count(3)->create();
    }
}
