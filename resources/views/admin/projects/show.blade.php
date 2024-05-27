@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h1>Project</h1>

            <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
            
            <x-button-delete :id="$project->id" :name="$project->name" :route="route('admin.projects.destroy', $project)">
            </x-button-delete>
        </div>
    </header>
    <section class="py-5">
        <div class="container">
            <a class="d-block mb-3" href="{{ route('admin.projects.index') }}">Go back</a>
            @if (Str::startsWith($project->image, 'https://'))
                <img width="140" loading="lazy" src="{{ $project->image }}" alt="{{ $project->name }}">
            @else
                <img width="140" loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                    alt="{{ $project->name }}">
            @endif
            <h2>{{ $project->name }}</h2>
            <div class="metadata">
                <strong>Type: </strong>
                <span>{{ $project->type->name ?? 'No category' }}</span>
            </div>
            <p>{{ $project->description }}</p>
    </section>
@endsection
