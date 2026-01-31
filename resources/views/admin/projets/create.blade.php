@extends('layouts.portfolio_master')
@section('title', 'Create Project')
@section('content')
    <main>
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Create New Project</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form method="POST" action="{{ route('admin.projects.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="titre" class="form-label">Project Title</label>
                                <input type="text" class="form-control" id="titre" name="titre" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                            <div class="mb-3">
                                <label for="link_live" class="form-label">Live Link</label>
                                <input type="url" class="form-control" id="link_live" name="link_live">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold">Technologies Used</label>
                                <div class="border p-3 rounded">
                                    @foreach ($competences as $competence)
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                name="competence_id[]" 
                                                value="{{ $competence->id }}" 
                                                id="competence-{{ $competence->id }}"
                                                {{ (is_array(old('competence_id')) && in_array($competence->id, old('competence_id'))) ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="competence-{{ $competence->id }}">
                                                {{ $competence->nom }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('competence_id') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection