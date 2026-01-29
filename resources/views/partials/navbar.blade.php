<!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href={{ route('home') }}><span class="fw-bolder text-primary">Sly Dev Portfolio</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href={{ route('home') }}>Home</a></li>
                            <li class="nav-item"><a class="nav-link" href={{ route('Resume') }}>Resumer</a></li>
                            <li class="nav-item"><a class="nav-link" href={{ route('projets') }}>Projects</a></li>
                            <li class="nav-item"><a class="nav-link" href='#'>Blog</a></li>
                            @auth
                            <li class="nav-item"><a class="nav-link" href={{route('admin.Competences.index')}}>Competences</a></li>
                            <li class="nav-item"><a class="nav-link" href={{ route('admin.diplomes.index') }}>Diplomes / Certifications</a></li>
                            <li class="nav-item"><a class="nav-link" href='#'>Experiences</a></li>
                            <li class="nav-item"><a class="nav-link" href={{ route('admin.messages.index') }}>Messages</a></li>
                            @endauth
                            <li class="nav-item"><a class="nav-link" href={{ route('contact') }}>Contact</a></li>
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm me-3">Dashboard Administration</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm me-3">Conexion</a>
                            <a href="{{ route('inscrire') }}" class="btn btn-outline-dark fw-bolder btn-sm me-3">Inscription</a>
                        @endauth
                        </ul>
                    </div>
                </div>
            </nav>