@extends('layouts.portfolio_master')
@section('title', $project->titre)
@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-uppercase border-bottom d-inline-block pb-2">{{ $project->titre }}</h1>
        <p class="text-muted mt-3">{{ $project->category }} Project Details</p>
        <p>Statut : {{ $project->statut }}</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">                    
                    <img src="{{ asset('storage/' . $project->image) }}" 
                        class="card-img-top" 
                        alt="{{ $project->title }}"
                        onerror="this.src='https://placehold.co/600x400?text=Pas+d'image'">
                    <h4 class="fw-bold mb-3">Description</h4>
                    <p class="text-muted mb-4">{{ $project->description }}</p>  
                    <h5 class="fw-bold mb-3">Technologies Utilisées</h5>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @forelse ($project->competence as $competence) 
                            <span class="badge bg-primary">{{ $competence->nom }}</span>
                        @empty
                            <span class="badge bg-soft-primary"></span>
                        @endforelse
                    </div>
                <div class="d-flex">
                    @if($project->lien_demo)  
                        <a href="{{ $project->link_live }}" target="_blank" class="btn btn-primary">
                            <i class="bi bi-eye"></i> Voir la Démo
                        </a>            
                    @endif
                    @if($project->lien_github)  
                        <a href="{{ $project->lien_github }}" target="_blank" class="btn btn-dark ms-2">
                            <i class="bi bi-github"></i> Voir le Code Source
                        </a>
                    @endif

                    <a href="{{ route('projets') }}" class="btn btn-outline-secondary ms-2">
                        <i class="bi bi-arrow-left"></i> Retour aux Projets
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    /* Styles personnalisés pour compenser l'absence d'images */
    .project-card {
        transition: transform 0.3s ease, shadow 0.3s ease;
    }
    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .project-icon {
        font-size: 1.5rem;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .bg-soft-primary {
        background-color: #e7f1ff;
        color: #0d6efd;
    }
    /* Ajout des icônes Bootstrap si pas déjà présentes */
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css");
</style>