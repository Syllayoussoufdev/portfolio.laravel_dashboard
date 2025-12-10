@extends('layouts.app')
      <main class="flex-shrink-0">
        @section('content')
            <!-- Diplomes Section-->
            
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Add New Diploma / Certification</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form method="POST" action="{{ route('diplomes.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="Titre" class="form-label">Diploma / Certification Titre</label>
                                    <input type="text" class="form-control" id="Titre" name="Titre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Annee_obtention" class="form-label">Annee_obtention</label>
                                    <input type="number" class="form-control" id="Annee_obtention" name="Annee_obtention" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Centre_formateur" class="form-label">Centre_formateur</label>
                                    <input type="text" class="form-control" id="Centre_formateur" name="Centre_formateur" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Diploma / Certification</button>
                            </form>
                        </div>
                    </div>
                </div>

        @endsection