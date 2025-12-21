@extends('layouts.portfolio_master')
@section('title', 'Add Competence')
    @section('content')
      <main class="flex-shrink-0">
            <!-- Competences Section-->
            
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Add New Competence</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form method="POST" action="{{ route('competences.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Competence Name</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="niveau" class="form-label">Niveau</label>
                                    <input type="text" class="form-control" id="niveau" name="niveau" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pourcentage" class="form-label">Pourcentage</label>
                                    <input type="number" class="form-control" id="pourcentage" name="pourcentage" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Associer aux Diplômes</label>
                                    <div class="border p-3 rounded">
                                        @foreach ($diplomes as $diplome)
                                            <div class="form-check">
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="diplome_id[]" 
                                                    value="{{ $diplome->id }}" 
                                                    id="diplome-{{ $diplome->id }}"
                                                    {{-- Maintenir l'état coché en cas d'erreur de validation --}}
                                                    {{ in_array($diplome->id, old('diplome_id', [])) ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="diplome-{{ $diplome->id }}">
                                                    {{ $diplome->Titre }} ({{ $diplome->Annee_obtention }})
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('diplome_id') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Competence</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
