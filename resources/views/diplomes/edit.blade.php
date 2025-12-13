@extends('layouts.app')
@section('title', 'Edit Diploma / Certification')
@section('content')
      <main class="flex-shrink-0">
            <!-- Diplomes Section-->
            
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Modifier Diplomes / Certification</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form method="POST" action="{{ route('diplomes.update', $diplome->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Diplomes / Certification Name</label>
                                    <input type="text" class="form-control" id="Titre" name="Titre" value="{{ $diplome->Titre }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Annee_obtention" class="form-label">Annee_obtention</label>
                                    <input type="number" class="form-control" id="Annee_obtention" name="Annee_obtention" value="{{ $diplome->Annee_obtention }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Centre_formateur" class="form-label">Centre_formateur</label>
                                    <input type="text" class="form-control" id="Centre_formateur" name="Centre_formateur" value="{{ $diplome->Centre_formateur }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="competence_id" class="form-label">Associer des Compétences</label>
                                    <div class="border p-3 rounded">
                                        @foreach ($competences as $competence)
                                            <div class="form-check">
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="competence_id[]" 
                                                    value="{{ $competence->id }}" 
                                                    id="competence-{{ $competence->id }}"
                                                    {{-- Maintenir l'état coché en cas d'erreur de validation ou si déjà associé --}}
                                                    {{ in_array($competence->id, old('competence_id', $diplome->competence->pluck('id')->toArray())) ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="competence-{{ $competence->id }}">
                                                    {{ $competence->nom }} 
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('competence_id') <div class="text-danger mt-2">{{ $message }}</div> @enderror    

                                    </div>                                    
                                </div>
                                <button type="submit" class="btn btn-primary">Update Diplomes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>            
        </main>
    @endsection
