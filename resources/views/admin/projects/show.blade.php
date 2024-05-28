@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between">
            <h1>Project</h1>

            <div class="d-flex align-self-center gap-2">
                <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-arrow-left"></i> Back to projects list</a>
                <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                <x-button-delete :id="$project->id" :name="$project->name" :route="route('admin.projects.destroy', $project)">
                </x-button-delete>
            </div>
        </div>
    </header>
    <section class="py-5 bg-light">
        <div class="container" style="min-height: 600px">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 vertical-align-center">
                        @if (Str::startsWith($project->image, 'https://'))
                            <img class="img-fluid" loading="lazy" src="{{ $project->image }}" alt="{{ $project->name }}">
                        @else
                            <img class="img-fluid" loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->name }}">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title mb-3">{{ $project->name }}</h3>

                            <div class="metadata mb-3">
                                <strong>Category: </strong>
                                <span>{{ $project->type->name ?? 'No category' }}</span>
                                <br>
                                <strong>Technologies: </strong>
                                @forelse ($project->technologies as $technology)
                                    <span>{{ $technology->name }}</span>
                                @empty
                                    <span>Technologies not found</span>
                                @endforelse
                            </div>

                            <h5 class="mb-1">Description:</h5>
                            <p>{{ $project->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
