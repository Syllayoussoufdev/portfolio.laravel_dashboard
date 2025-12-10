@extends('layouts.app')
      <main class="flex-shrink-0">
@section('content')
            <!-- Competences Section-->
            
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Edit Competence</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form method="POST" action="{{ route('competences.update', $competence->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Competence Name</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $competence->nom }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="niveau" class="form-label">Niveau</label>
                                    <input type="text" class="form-control" id="niveau" name="niveau" value="{{ $competence->niveau }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pourcentage" class="form-label">Pourcentage</label>
                                    <input type="number" class="form-control" id="pourcentage" name="pourcentage" value="{{ $competence->pourcentage }}" required>
                                </div>
                                    <div class="mb-3">
                                        <label for="diplome_ids" class="form-label">Select Diplomas / Certifications</label>
                                        <select multiple class="form-control" id="diplome_ids" name="diplome_ids[]">
                                            @foreach($diplomes as $diplome)
                                                <option value="{{ $diplome->id }}" {{ $competence->diplomes->contains($diplome->id) ? 'selected' : '' }}>
                                                    {{ $diplome->Titre }} ({{ $diplome->Annee_obtention }}) - {{ $diplome->Centre_formateur }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                <button type="submit" class="btn btn-primary">Update Competence</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            @endsection
        </main>