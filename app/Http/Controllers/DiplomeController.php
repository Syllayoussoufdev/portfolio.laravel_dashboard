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
        $diplomes = Diplome::with('competence')->get();
        return view('diplomes.index', compact('diplomes'));//-- IGNORE ---
        //return response()->json($diplomes); utiliser pour API --- IGNORE ---
    }
    public function create()
    {
        $competences = Competence::all();
        return view('diplomes.create', compact('competences'));
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
            'competence_id' => 'nullable|array',
            'competence_id.*' => 'exists:competences,id',
            
        ]);
        $diplome = Diplome::create($request->all());
        if ($request->has('competence_id')) {
            $diplome->competence()->attach($request->input('competence_id'));
        }
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
            'competence_id' => 'nullable|array',
            'competence_id.*' => 'exists:competences,id',
        ]);
        $diplome = Diplome::findOrFail($id);
        $diplome->update($request->all());
        if ($request->has('competence_id')) {
            // La méthode sync() met à jour les entrées dans la table pivot (diplome_competence)
            $diplome->competence()->sync($request->input('competence_id'));
        } else {
            // Si aucune compétence n'est sélectionnée, détacher toutes les compétences associées
            $diplome->competence()->detach();
        }
        return redirect()->route('diplomes.index')
            ->with('success', 'Diplôme mis à jour avec succès.');
        // return response()->json(['message' => 'Diplôme mis à jour avec succès.'], 200); utiliser pour API
    }

    function edit(string $id)
    {
        $diplome = Diplome::findOrFail($id);
        $competences = Competence::all();
        $diplome->competence->pluck('id')->toArray();
        return view('diplomes.edit', compact('diplome', 'competences'));
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
    
}