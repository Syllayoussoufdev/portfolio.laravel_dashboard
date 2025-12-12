<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competence;
use App\Models\Diplome;
use Illuminate\Http\Response;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$competences = Competence::all();
        $competences= Competence::with('diplome')->get();
        return view('competences.index', compact('competences'));
        // return response()->json($competences); utiliser pour API
    }
    public function create()
    {
        $diplomes = Diplome::all();
        return view('competences.create', compact('diplomes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'pourcentage' => 'required|integer|min:0|max:100',
            'diplome_id' => 'nullable|array',
            'diplome_id.*' => 'exists:diplomes,id',
        ]);
        $competence = Competence::create($validated);
        if ($request->has('diplome_id')) {
            // La méthode attach() insère les entrées dans la table pivot (diplome_competence)
            $competence->diplome()->attach($validated['diplome_id']);
        }

        return redirect()->route('competence')
            ->with('success', 'Compétence créée avec succès.');
        // return response()->json(['message' => 'Compétence créée avec succès.'], 201); retourner pour API
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Competence::findOrFail($id);
        return view('competences.show', compact('competence'));
    }
    public function edit(string $id)
    {
        $competence = Competence::findOrFail($id);
        $diplomes = Diplome::all();
        return view('competences.edit', compact('competence', 'diplomes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'pourcentage' => 'required|integer|min:0|max:100',
            'diplome_id' => 'nullable|array',
            'diplome_id.*' => 'exists:diplomes,id',
        ]);
        $competence= Competence::findOrFail($id);
        $competence->update($request->all());
        If ($request->has('diplome_id')) {
            // La méthode sync() met à jour les entrées dans la table pivot (diplome_competence)
            $competence->diplome()->sync($request->input('diplome_id'));
        } else {
            // Si aucun diplôme n'est sélectionné, détacher tous les diplômes associés
            $competence->diplome()->detach();
        }
        return redirect()->route('competence')
            ->with('success', 'Compétence mise à jour avec succès.');
        // return response()->json(['message' => 'Compétence mise à jour avec succès.'], 200); utiliser pour API
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $competence = Competence::findOrFail($id);
        $competence->delete();
        return redirect()->route('competence')
            ->with('success', 'Compétence supprimée avec succès.');
        // return response()->json(['message' => 'Compétence supprimée avec succès.'], 200); utiliser pour API
    }
    public function assignToDiplome(Request $request, $id)
    {
        $request->validate([
            'diplome_ids' => 'required|array',
            'diplome_ids.*' => 'exists:diplomes,id',
        ]);
        $competence = Competence::findOrFail($id);
        $diplomeIds = $request->input('diplome_ids', []);
        $competence->diplome()->sync($diplomeIds);
        return redirect()->route('competence')
            ->with('success', 'Compétence assignée aux diplômes avec succès.');
    }
    public function assignToDiplomeForm($id)
    {
        $competence = Competence::findOrFail($id);
        $diplomes = Diplome::all();
        return view('competences.assign_diplomes', compact('competence', 'diplomes'));
    }
}
