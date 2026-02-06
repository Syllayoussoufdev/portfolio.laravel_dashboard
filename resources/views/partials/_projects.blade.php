<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-uppercase border-bottom d-inline-block pb-2">Mes Réalisations</h1>
        <p class="text-muted mt-3">Solutions techniques, automatisation et développement sur-mesure.</p>
    </div>

    <div class="row g-4">
        @auth         
        <div class="col-12 text-end mb-3">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Ajouter un Projet
            </a>
        </div>
        @endauth
        @forelse($projects as $project)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm project-card">
                <div class="card-header p-0 border-0 bg-primary" style="height: 5px;"></div>
                
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="project-icon bg-light rounded p-3 text-primary">
                            @if($project->category == 'Mobile')
                                <i class="bi bi-phone"></i>
                            @elseif($project->category == 'IA')
                                <i class="bi bi-cpu"></i>
                            @else
                                <i class="bi bi-code-slash"></i>
                            @endif
                        </div>
                        <span class="badge rounded-pill bg-light text-dark border">{{ $project->category }}</span>
                        
                    </div>

                    <h4 class="card-title fw-bold mb-3">{{ $project->titre }}</h4>
                    <h6>
                        <small class="text-muted">statut : "{{ $project->statut }}"</small>
                    </h6>
                    
                    <p class="card-text text-muted mb-4">
                        {{ Str::limit($project->description, 120) }}
                    </p>

                    <div class="mb-4">
                        <small class="text-uppercase fw-semibold text-primary opacity-75" style="font-size: 0.75rem;">Technologies :</small>
                        <div class="d-flex flex-wrap gap-2 mt-1">
                            @forelse ($project->competence as $competence) 
                                <span class="badge bg-primary">{{ $competence->nom }}</span>
                            @empty
                                <span class="badge bg-soft-primary">Laravel,Bootstrap,MySQL</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <div class="d-flex gap-2">
                        @if($project->link_live)
                            <a href="{{ $project->link_live }}" target="_blank" class="btn btn-primary btn-sm flex-grow-1">
                                <i class="bi bi-eye"></i> Démo
                            </a>
                        @endif
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-dark btn-sm flex-grow-1">
                            Détails
                        </a>
                    @auth
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm flex-grow-1">
                            <i class="bi bi-pencil-square"></i> Éditer
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="flex-grow-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                                <i class="bi bi-trash"></i> Supprimer
                            </button>
                        </form>
                    @endauth
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Aucun projet à afficher pour le moment. 🚀</p>
        </div>
        @endforelse
    </div>
</div>

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
