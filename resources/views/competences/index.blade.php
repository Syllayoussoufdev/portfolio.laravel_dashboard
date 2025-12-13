@extends('layouts.app')
@section('title', 'Competences')
    @section('content')
      <main class="flex-shrink-0">
            <!-- Competences Section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Competences</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">                                                        
                            <a href="{{ route('competences.create') }}" class="btn btn-primary">creer</a>    
                            <!-- Competence Card 1-->
                            @foreach ($competences as $competence)
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="p-5">
                                            <h2 class="fw-bolder">{{ $competence->nom }}</h2>
                                            <p>Niveau : {{ $competence->niveau }}.</p>
                                            <p>pourcentage : {{ $competence->pourcentage }}</p>
                                            @forelse ($competence->diplome as $diplome) 
                                                <span class="badge bg-primary">{{ $diplome->Titre }} ({{ $diplome->Annee_obtention }})</span>
                                            @empty
                                                <span class="text-danger">Aucun diplôme associé.</span>
                                            @endforelse
                                            <a href="{{ route('competences.assignDiplomesForm', $competence->id)}}" class="btn btn-secondary">Assignement de Diplome</a>
                                            <a href="{{ route('competences.edit', $competence->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('competences.destroy', $competence->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                        </div>
                                        <img class="img-fluid" src="https://dummyimage.com/300x400/343a40/6c757d" alt="..." />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection