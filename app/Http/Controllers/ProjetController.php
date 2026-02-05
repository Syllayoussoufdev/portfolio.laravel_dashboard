<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competence;
use App\Models\Projet;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Projet::with('competence')->get();
        return view('portfolio.projects', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //@dd( $request->all());
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2Mo
            'slug' => 'nullable|string|max:255',
            'statut' => 'nullable|string|max:255',
            'lien_github' => 'nullable|url',
            'lien_demo' => 'nullable|url',
            'competence_id' => 'nullable|array',
            'competence_id.*' => 'exists:competences,id',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            // On stocke l'image dans le dossier 'public/projets'
        // store() retourne le chemin : "projets/nom_aleatoire.jpg"
        $path = $request->file('image')->store('projets', 'public');
        
        // On remplace la valeur dans le tableau de données par le chemin
        $data['image'] = $path;
        }

        $project = Projet::create($data);
        if ($request->has('competence_id')) {
            $project->competence()->attach($request->input('competence_id'));
        }
        return redirect()->route('projets')
            ->with('success', 'Projet créé avec succès.');
    }

    public function create()
    {
        $competences = Competence::all();
        return view('admin.projets.create', compact('competences'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Projet::with('competence')->findOrFail($id);
        
        return view('portfolio.project_detail', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Titre' => 'required|string|max:255',
            'Description' => 'required|string',
            'slug' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'Lien_Github' => 'nullable|url',
            'Lien_Demo' => 'nullable|url',
            'competence_id' => 'nullable|array',
            'competence_id.*' => 'exists:competences,id',
        ]);
        $project = Projet::findOrFail($id);
        $project->update($request->all());
        if ($request->has('competence_id')) {
            $project->competence()->sync($request->input('competence_id'));
        } else {
            $project->competence()->detach();
        }
        return redirect()->route('projects.index')
            ->with('success', 'Projet mis à jour avec succès.');
    }
        public function edit(string $id)
        {
            $project = Projet::findOrFail($id);
            $competences = Competence::all();
            return view('admin.projets.edit', compact('project', 'competences'));
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Projet::findOrFail($id);
        $project->competence()->detach();
        $project->delete();
        return redirect()->route('projets')
            ->with('success', 'Projet supprimé avec succès.');
    }
}
