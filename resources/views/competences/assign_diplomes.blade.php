@extends('layouts.app')
      <main class="flex-shrink-0">
        @section('content')
            <!-- Diplomes Section-->
            
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Assign Diplomas / Certifications to Competence</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form method="POST" action="{{ route('competences.assignDiplomes', $competence->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="diplome_ids" class="form-label">Select Diplomas / Certifications</label>
                                    <select multiple class="form-control" id="diplome_ids" name="diplome_ids[]">
                                        @foreach($diplomes as $diplome)
                                            <option value="{{ $diplome->id }}" {{ in_array($diplome->id, $diplomes) ? 'selected' : '' }}>
                                                {{ $diplome->Titre }} ({{ $diplome->Annee_obtention }}) - {{ $diplome->Centre_formateur }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Assign Diplomas / Certifications</button>
                            </form>
                        </div>
                    </div>
                </div>
        @endsection
        </main>

