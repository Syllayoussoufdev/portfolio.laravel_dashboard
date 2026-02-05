@extends('layouts.portfolio_master')
@section('title', 'Contact')
@section('content')
        <main class="flex-shrink-0">
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Me Contacter Directment</h1>
                            <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                        </div>
                        
                        <div class="row gx-5 justify-content-center">
                            
                            <div class="col-lg-4 col-xl-3 align-self-center">
                                <!-- Contact information-->
                                <div class="text-center text-lg-start">
                                    <h4 class="fw-bolder mb-4">Contact info</h4>
                                    <div class="mb-3">
                                        <i class="bi bi-telephone"></i> 
                                        <a class="text-muted" href="tel:+2250594564993">+225 0594564993</a>
                                    </div>
                                    <p class="mb-2">
                                        <i class="bi bi-telephone-fill me-2"></i>
                                        (+225) 05-94-56-49-93 /
                                        (+225) 07-06-23-21-93
                                    </p>
                                    <p class="mb-2">
                                        <i class="bi bi-envelope-fill me-2"></i>
                                        youssoufs120@gmail.com 
                                    </p>
                                    <p class="mb-2">
                                        <i class="bi bi-geo-alt-fill me-2"></i>
                                        Bp- 128 , Abidjan, Côte d'Ivoire
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <form id="contactForm" action="{{ route('Mesage.store') }}" method="POST"  data-sb-form-api-token="API_TOKEN">
                                    @csrf
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nom" name="nom" type="text" placeholder="Entrez votre Nom..." data-sb-validations="required" />
                                        <label for="name">Nom et Prenom :</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Champ obligatoire</div>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="sylla@example.com" data-sb-validations="required,email" />
                                        <label for="email">Email :</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">Champ Email obligatoire</div>
                                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="sujet" name="sujet" type="text" placeholder="Objet" data-sb-validations="required" />
                                        <label for="phone">Objet : </label>
                                        <div class="invalid-feedback" data-sb-feedback="phone:required">Champ obligatoire</div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label for="message">Message</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                    </div>
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form / c'est ce que l'utilisateur vera quand il t'enveras un message-->
                                    <!-- has successfully submitted / soumission reusie-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Formulaire soumis avec success</div>                                            
                                        </div>
                                    </div>
                                    <!-- Message d'erreur-->
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error Envois de message!</div></div>
                                    <!-- Submit Button-->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" >Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                    </div>
                </div>
            </section>
        </main>
        <!-- About Section-->
            <section class="bg-light py-5">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-xxl-8">
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">A propos de moi</span></h2>
                                <p class="lead fw-light mb-4"> Je suis Sylla Youssouf Developpeur Web Laravel</p>
                                <p class="text-muted">Développeur Fullstack (Junior) avec Deux ans d'experiences qui m'ont permis d'avoir, une approche orientée résultats. 
                                    J'allie la flexibilité du travail indépendant à une maîtrise rigoureuse des dernières technologies pour 
                                    livrer des produits qui marquent les esprits et un faculter d'adaptation rapide.</p>
                                <div class="d-flex justify-content-center fs-2 gap-4">                                    
                                    <a class="text-gradient" href="https://www.linkedin.com/in/sylla-youssouf-devweb/"><i class="bi bi-linkedin"></i></a>
                                    <a class="text-gradient" href="https://github.com/Syllayoussoufdev"><i class="bi bi-github"></i></a>
                                    <a class="text-gradient" href="https://www.facebook.com/profile.php?id=61575957370011"><i class="bi bi-facebook"></i></a>
                                    <a class="text-gradient" href="https://wa.me/2250594564993"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <!-- Footer-->
@endsection

@section('scripts')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
