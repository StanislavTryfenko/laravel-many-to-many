@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between">
            <h1>Project</h1>

            <div class="d-flex align-self-center gap-2">
                <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                <x-button-delete :id="$project->id" :name="$project->name" :route="route('admin.projects.destroy', $project)">
                </x-button-delete>
            </div>
        </div>
    </header>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if (Str::startsWith($project->image, 'https://'))
                            <img class="img-fluid" loading="lazy" src="{{ $project->image }}" alt="{{ $project->name }}">
                        @else
                            <img class="img-fluid" loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->name }}">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">{{ $project->name }}</h3>

                            <div class="metadata">
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

                            <h4>Description:</h4>
                            <p>{{ $project->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @if (Str::startsWith($project->image, 'https://'))
            <img width="140" loading="lazy" src="{{ $project->image }}" alt="{{ $project->name }}">
            @else
            <img  width="140" loading="lazy" src="{{ asset('storage/' . $project->image) }}"
            alt="{{ $project->name }}">
            @endif
            <h2>{{ $project->name }}</h2>
            <div class="metadata">
                <strong>Type: </strong>
                <span>{{ $project->type->name ?? 'No category' }}</span>
            </div>
            <p>{{ $project->description }}</p>
            <a class="mb-3 btn btn-primary" href="{{ route('admin.projects.index') }}">Go back</a> --}}
    </section>
@endsection
