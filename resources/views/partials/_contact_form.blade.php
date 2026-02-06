<main class="flex-shrink-0">
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Me Contacter</h1>
                            <p class="lead fw-normal text-muted mb-0">Via ce Formulaire, En remplisant ces Champs</p>
                        </div>
                        
                        <div class="row gx-5 justify-content-center">
                            
                            <div class="col-lg-4 col-xl-3 align-self-center">
                                <!-- Contact information-->
                                <div class="text-center text-lg-start">
                                    <h4 class="fw-bolder mb-4">Informations de Contact</h4>
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
                                        Abidjan, Côte d'Ivoire
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
                                        <div class="invalid-feedback" data-sb-feedback="email:email">Email n'est pas Valide.</div>
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