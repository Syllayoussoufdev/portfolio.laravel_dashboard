<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Diplome;
use App\Models\Competence;


class ResumeController extends Controller
{
    public function index()
    {
        // On récupère les expériences (la plus récente en premier)
        $experiences = Experience::orderBy('id', 'desc')->get();

        // On récupère les diplômes
        $diplomes = Diplome::orderBy('Annee_obtention', 'desc')->get();

        // On récupère les compétences par catégorie (professionnelle et language)
        $skills = Competence::where('category', 'professional')->get();
        $languages = Competence::where('category', 'language')->get();

        return view('portfolio.resume', compact('experiences', 'diplomes', 'skills', 'languages'));
    }
}
