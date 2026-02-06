<main class="flex-shrink-0">
                        <!-- Page Content-->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Resumer</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <section>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h2 class="text-primary fw-bolder mb-0">Experiences</h2>
                                <!-- Download resume button-->
                                <!-- Note: Set the link href target to a PDF file within your project-->
                                <a class="btn btn-primary px-4 py-3" href="https://drive.google.com/file/d/1QcazYWZxhZDElVoAtrI3aunBUd6ih-Qs/view?usp=drive_link">
                                    <div class="d-inline-block bi bi-download me-2"></div>
                                    Download mon CV
                                </a>
                            </div>
                            <!-- Experience Card 1-->
                            @foreach($experiences as $experience)
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-primary fw-bolder mb-2">{{$experience->periode}}</div>
                                                <div class="small fw-bolder">{{ $experience->poste }}</div>
                                                <div class="small text-muted">{{ $experience->entreprise }}</div>
                                                <div class="small text-muted">{{ $experience ->lieu }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8"><div>{{ $experience->description }}</div></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                                                        
                        </section>
                        <!-- Education Section-->
                        <section>
                            <h2 class="text-secondary fw-bolder mb-4">Educations / Diplomes</h2>
                            <!-- Education Card 1-->
                            @foreach($diplomes as $diplome)
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-secondary fw-bolder mb-2">{{ $diplome->Annee_obtention }}</div>
                                                <div class="mb-2">
                                                    <div class="small fw-bolder">{{ $diplome->Centre_formateur }}</div>
                                                    <div class="small text-muted">{{ $diplome->Lieu_centre }}</div>
                                                </div>
                                                <div class="fst-italic">
                                                    <div class="small text-muted">{{ $diplome->Niveau_diplome }}</div>
                                                    <div class="small text-muted">{{ $diplome->Titre }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8"><div>{{ $diplome->Description }}</div></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </section>
                        <!-- Divider-->
                        <div class="pb-5"></div>
                        <!-- Skills Section-->
                        <section>
                            <!-- Skillset Card-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <!-- Professional skills list-->
                                    <div class="mb-5">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Compétences professionnelles</span></h3>
                                        </div>                                        
                                        <div class="row row-cols-1 row-cols-md-3">
                                            @foreach($skills as $skill)
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">{{ $skill->nom }}</div></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Languages list-->
                                    <div class="mb-0">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-code-slash"></i></div>
                                            <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Langages et Framework</span></h3>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3 mb-4">                                            
                                            @foreach($languages as $language)
                                            <div class="col mb-4 mb-md-0"><div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">{{ $language->nom }}</div></div>
                                            @endforeach
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    @section('scripts')
        <!-- Footer-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    @endsection