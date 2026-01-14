<div class="admin-sidebar">
    <h3>Menu Admin</h3>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.diplomes.index') }}">Gérer Diplômes</a></li>
        <li><a href="{{ route('admin.competences.index') }}">Gérer Compétences</a></li>
        <li><a href="{{ route('admin.projets.index') }}">Gérer Projets</a></li>
        <hr>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
        </li>
    </ul>
</div>