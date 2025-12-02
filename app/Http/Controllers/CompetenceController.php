<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competence;
use Illuminate\Http\Response;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competences = Competence::all();
        return view('competences.index', compact('competences'));
        // return response()->json($competences); utiliser pour API
    }
    public function create()
    {
        return view('competences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'pourcentage' => 'required|integer|min:0|max:100',
        ]);
        Competence::create($request->all());
        return redirect()->route('competences.index')
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
        return view('competences.edit', compact('competence'));
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
        ]);
        $competence= Competence::findOrFail($id);
        $competence->update($request->all());
        return redirect()->route('competences.index')
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
        return redirect()->route('competences.index')
            ->with('success', 'Compétence supprimée avec succès.');
        // return response()->json(['message' => 'Compétence supprimée avec succès.'], 200); utiliser pour API
    }
    public function assignToDiplome(Request $request, $competenceId)
    {
        $competence = Competence::findOrFail($competenceId);
        $diplomeIds = $request->input('diplome_ids', []);
        $competence->diplome()->sync($diplomeIds);
        return redirect()->route('competences.index')
            ->with('success', 'Compétence assignée aux diplômes avec succès.');
    }
    public function assignToDiplomeForm($competenceId)
    {
        $competence = Competence::findOrFail($competenceId);
        $diplomes = Diplome::all();
        return view('competences.assign_diplomes', compact('competence', 'diplomes'));
    }
}
