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
                                    <label for="name" class="form-label">Diploma / Certification Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Diploma / Certification</button>
                            </form>
                        </div>
                    </div>
                </div>

        @endsection