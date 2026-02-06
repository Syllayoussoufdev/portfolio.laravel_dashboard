<?php

namespace App\Http\Controllers;
use App\Models\Competence;
use App\Models\Diplome;
use App\Models\Experience;
use App\Models\Projet;


use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {       
        // On récupère les diplômes
        //$diplomes = Diplome::orderBy('Annee_obtention', 'desc')->get();

        // On récupère les compétences par catégorie (professionnelle et language)
        $skills = Competence::where('category', 'professional')->get();
        $languages = Competence::where('category', 'language')->get();
        return view('portfolio.Home', compact('skills', 'languages') ,[
            'competences' => Competence::all(),
            'diplomes' => Diplome::all(),
            'experiences' => Experience::all(),
            'projects' => Projet::with('competence')->get(),
        ]);
    }
}
