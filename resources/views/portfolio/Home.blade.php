@extends('layouts.portfolio_template')
@section('content')
    <!-- Section Accueil (Hero) -->
    <!-- HERO -->
    <section id="accueil" class="hero" aria-labelledby="hero-title">
        <div class="container hero-content">
        <div class="hero-image">
            <!-- Placeholder pour votre photo - remplacez par votre vraie photo -->
            <div class="profile-photo">
                <img src="{{ asset('assets/images/profil3.png') }}" alt="Photo de profil" />
            </div>
        </div>

        <div class="hero-right">
            <h1 id="hero-title" class="hero-title">{{ $owner->name }}</h1>
            <p class="hero-subtitle">{{ $owner->titre_professionnel}}</p>
            <p class="hero-description">{{ $owner->biographie }}</p>

            <div class="hero-buttons">
            <!-- lien direct vers ton CV (PDF) -->
            <a class="btn btn-primary" target="_blank" href="{{ $owner->cv }}" download aria-label="Télécharger le CV de Sylla Youssouf">
                <i class="fas fa-download"></i> Télécharger mon CV
            </a>
            <a class="btn btn-secondary" href="#contact"><i class="fas fa-envelope"></i> Me contacter</a>
            </div>

            <!-- Skills quick badges -->
            <div class="quick-skills" aria-hidden="false">
            <span class="skill-badge">PHP</span>
            <span class="skill-badge">Laravel</span>
            <span class="skill-badge">MySQL</span>
            <span class="skill-badge">JavaScript</span>
            <span class="skill-badge">React</span>
            </div>
        </div>
        </div>
    </section>

    <!-- Section À propos -->
    <section id="apropos" class="about">
        <div class="container">
            <h2 class="section-title">À propos de moi</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        Jeune diplômé d'un BTS en Informatique Développeur d'Applications, j'ai travaillé sur plusieurs projets en PHP, Laravel, MySQL, HTML, CSS, JavaScript et Bootstrap. J'ai également une initiation en React.js et Flutter/Dart. Passionné par l'innovation digitale et les outils no-code, j'ai aussi une expérience en support technique, formation et documentation.
                    </p>
                    
                    <h3>Mon parcours</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">2025</div>
                            <div class="timeline-content">
                                <h4>Assistant technique - MUSCOP-CI : (Temp parciel)</h4>
                                <p>Support utilisateurs, formation, déploiement applicatif</p><br>

                                <h4>Freelance web - (Temp parciel)</h4>
                                <p>Propection et Realisatin de projet web en Freelance pas trop gros (site web, vibe coding, no-code, ect ...)</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2023-2024</div>
                            <div class="timeline-content">
                                <h4>Stage développeur web - Stratos-CI</h4>
                                <p>PHP/Laravel, MySQL, Bootstrap, correction de bugs et documentation</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">2021-2023</div>
                            <div class="timeline-content">
                                <h4>BTS Informatique Développeur d'Applications</h4>
                                <p>ISFMI(Institut Supperieur de formation au Metier de l'Informatique) Abidjan - Diplôme et Soutenance</p>
                            </div>
                        </div>
                    </div>                    
                </div>
                
                <div class="about-cards">
                    <div class="info-card">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <h4>Localisation</h4>
                            <p>Abidjan, Côte d'Ivoire</p>
                        </div>
                            <div class="info-card">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <h4>Email</h4>
                                <p><a href="mailto:youssoufs1209@gmail.com">youssoufs1209@gmail.com</a></p>
                            </div>
                        <div class="info-card">
                            <i class="fab fa-github" aria-hidden="true"></i>
                            <h4>GitHub</h4>
                            <p><a href="https://github.com/Syllayoussoufdev" target="_blank" rel="noopener">Syllayoussoufdev</a></p>
                        </div>
                        <div class="info-card">
                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                            <h4>LinkedIn</h4>
                            <p><a href="https://www.linkedin.com/in/sylla-youssouf-devweb?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener">Sylla Youssouf</a></p>
                        </div>
                </div>
            </div>
        </div>
    </section>
        
    <!-- Section Compétences -->
    <section id="competences" class="skills">
        <div class="container">
            <h2 class="section-title">Mes compétences</h2>
            <div class="skills-grid">

                <!-- Frontend Skills -->
                    <div class="skill-category">
                        <h3><i class="fas fa-palette"></i> Frontend</h3>
                            <div class="skill-list">
                            @foreach ($owner->competences as $competence)          
                                @if ($competence->type === 'Front-end')
                                        <div class="skill-item">
                                            <div class="skill-info">
                                                <span>{{ $competence->nom_competence }}</span>
                                                <span>{{ $competence->niveau }}</span>
                                                <span>{{ $competence->pourcentage }}</span>
                                            </div>
                                            <div class="skill-bar">
                                                <div class="skill-progress" data-width="{{ $competence->pourcentage }}%"></div>
                                            </div>
                                        </div>
                                @endif                          
                            @endforeach
                            </div>              
                    </div>

                <!-- Backend Skills -->
                <div class="skill-category">
                    <h3><i class="fas fa-server"></i> Backend</h3>
                            <div class="skill-list">
                                @foreach ($owner->competences as $competence)          
                                    @if ($competence->type === 'Back-end')
                                            <div class="skill-item">
                                                <div class="skill-info">
                                                    <span>{{ $competence->nom_competence }}</span>
                                                    <span>{{ $competence->niveau }}</span>
                                                    <span>{{ $competence->pourcentage }}</span>
                                                </div>
                                                <div class="skill-bar">
                                                    <div class="skill-progress" data-width="{{ $competence->pourcentage }}%"></div>
                                                </div>
                                            </div>
                                    @endif                          
                                @endforeach
                            </div>
                </div>

                <!-- Mobile & Outils -->
                <div class="skill-category">
                    <h3><i class="fas fa-mobile-alt"></i> Autre</h3>
                    <div class="skill-list">
                        @foreach ($owner->competences as $competence)          
                            @if ($competence->type === 'Autre')
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>{{ $competence->nom_competence }}</span>
                                            <span>{{ $competence->niveau }}</span>
                                            <span>{{ $competence->pourcentage }}</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" data-width="{{ $competence->pourcentage }}%"></div>
                                        </div>
                                    </div>
                            @endif                          
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Formations & Certificats -->
    <section id="apropos" class="about">
        <div class="container">
            <h2 class="section-title">Formations & Certificats </h2>
            <div class="about-content">
                <div class="about-text">
                    <div class="timeline">                        
                        @foreach ($certificats_grouped as $year => $certificats)
                        <div class="timeline-item">
                            <div class="timeline-date">{{ $year }}</div>
                            <div class="timeline-content">
                                @foreach ($certificats as $certificat)
                                    <h4>{{ $certificat->nom_diplome }}</h4>
                                    <p>{{ $certificat->centre_formateur }}</p><br>
                                    <p>{{ $certificat->description }}</p>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>  
                </div>                    
            </div>
        </div>
    </section>

    <!-- Section Projets -->
    <section id="projets" class="projects">
        @include('partials._projects')
    </section>

    <!-- Section Contact -->
    <section id="contact" class="contact">
        @include('partials._contact_form')
    </section>
    <!-- Script JavaScript -->
    <script src={{ asset('assets/js/script2.js') }}></script>

@endsection