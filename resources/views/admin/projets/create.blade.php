@extends('layouts.portfolio_master')
@section('title', 'Create Project')
@section('content')
    <main>
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Create New Project</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="titre" class="form-label">Titre du Projet :</label>
                                <input type="text" class="form-control" id="titre" name="titre" required>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug du Projet :</label>
                                <input type="text" class="form-control" id="slug" name="slug" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description :</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image du Projet :</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="Web">Web</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="IA">IA</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="statut" class="form-label">Statut du Projet :</label>
                                <select class="form-control" id="statut" name="statut">
                                    <option value="En cours">En cours</option>
                                    <option value="Terminé">Terminé</option>
                                    <option value="Publié">Publié</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="lien_demo" class="form-label">liens du projet : </label>
                                <input type="url" class="form-control" id="lien_demo" name="lien_demo">
                            </div>
                            <div class="mb-3">
                                <label for="lien_github" class="form-label">liens du Github : </label>
                                <input type="url" class="form-control" id="lien_github" name="lien_github">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Technologies Utilise et Skill developpe :</label>
                                <div class="border p-3 rounded">
                                    @foreach ($competences as $competence)
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                name="competence_id[]" 
                                                value="{{ $competence->id }}" 
                                                id="competence-{{ $competence->id }}"
                                                {{ (is_array(old('competence_id')) && in_array($competence->id, old('competence_id'))) ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="competence-{{ $competence->id }}">
                                                {{ $competence->nom }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('competence_id') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection