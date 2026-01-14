@extends('layouts.portfolio_master')
@section('title', 'Diplomes / Certifications')
    @section('content')
      <main class="flex-shrink-0">
            <!-- Contact Section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Diplomes / Certifications</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            @auth
                                <a href="{{ route('diplomes.create') }}" class="btn btn-primary">creer</a>                           
                            @endauth
                                <!-- Diploma Card 1-->
                            @foreach ($diplomes as $diplome)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $diplome->Titre }}</h5>
                                    <p class="card-text">{{ $diplome->Annee_obtention }}</p>
                                    <p>{{ $diplome->Centre_formateur }}</p>
                                    <p>
                                        Compétences associées :
                                        @forelse ($diplome->competence as $competence) 
                                        <span class="badge bg-secondary">{{ $competence->nom }}</span>
                                        @empty
                                            <span class="text-danger">Aucune compétence associée.</span>
                                        @endforelse
                                    </p>                                    
                                    <br>
                                    @auth
                                        <a href="{{ route('diplomes.edit', $diplome->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('diplomes.destroy', $diplome->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection