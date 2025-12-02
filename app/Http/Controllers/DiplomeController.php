<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diplome;
use App\Models\Competence;
use Illuminate\Http\Response;

class DiplomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplomes = Diplome::all();
        return view('diplomes.index', compact('diplomes'));//-- IGNORE ---
        //return response()->json($diplomes); utiliser pour API --- IGNORE ---
    }
    public function create()
    {
        return view('diplomes.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'Titre' => 'required|string|max:255',
            'Centre_formateur' => 'required|string|max:255',
            'Annee_obtention' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            
        ]);
        Diplome::create($request->all());
        return redirect()->route('diplomes.index')
            ->with('success', 'Diplôme créé avec succès.');
        // return response()->json(['message' => 'Diplôme créé avec succès.'], 201); retourner pour API
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diplome = Diplome::findOrFail($id);
        return view('diplomes.show', compact('diplome'));
        // return response()->json($diplome); utiliser pour API
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Titre' => 'required|string|max:255',
            'Centre_formateur' => 'required|string|max:255',
            'Annee_obtention' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
        ]);
        $diplome = Diplome::findOrFail($id);
        $diplome->update($request->all());
        return redirect()->route('diplomes.index')
            ->with('success', 'Diplôme mis à jour avec succès.');
        // return response()->json(['message' => 'Diplôme mis à jour avec succès.'], 200); utiliser pour API
    }

    function edit(string $id)
    {
        $diplome = Diplome::findOrFail($id);
        return view('diplomes.edit', compact('diplome'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diplome = Diplome::findOrFail($id);
        $diplome->delete();
        return redirect()->route('diplomes.index')
            ->with('success', 'Diplôme supprimé avec succès.');
        // return response()->json(['message' => 'Diplôme supprimé avec succès.'], 200); utiliser pour API
    }

    public function assignCompetencesForm($diplomeId)
    {
        $diplome = Diplome::findOrFail($diplomeId);
        $competences = Competence::all();
        return view('diplomes.assign_competences', compact('diplome', 'competences'));
    }

    public function assignCompetence(Request $request, $diplomeId, $competenceId)
    {
        $request->validate([
            'niveau_maitrise' => 'required|string|max:255',
        ]);
        $diplome = Diplome::findOrFail($diplomeId);
        $diplome->competence()->attach($competenceId, ['niveau_maitrise' => $request->input('niveau_maitrise')]);

        return redirect()->route('diplomes.show', $diplomeId)
            ->with('success', 'Compétence assignée avec succès.');
        //return response()->json(['message' => 'Compétence assignée avec succès.'], 200);
    }
}
