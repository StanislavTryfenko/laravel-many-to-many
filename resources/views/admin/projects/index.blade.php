@extends('layouts.admin')

@section('content')
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between">
            <h1>Projects</h1>
            <a class="btn btn-primary align-self-center" href="{{ route('admin.projects.create') }}">New project</a>
        </div>
    </header>
    <section class="py-5">
        <div class="container">

            @include('partials.session-messages')

            <div class="table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">COVER IMAGE</th>
                            <th scope="col">NAME</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">Technologies</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr class="">
                                <td scope="row">{{ $project->id }}</td>
                                <td>
                                    @if (Str::startsWith($project->image, 'https://'))
                                        <img width="140" loading="lazy" src="{{ $project->image }}"
                                            alt="{{ $project->name }}">
                                    @else
                                        <img width="140" loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $project->name }}">
                                    @endif
                                </td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->type->name ?? 'No category' }}</td>
                                <td>
                                    @forelse ($project->technologies as $technology)
                                        <span>{{ $technology->name }}</span>
                                    @empty
                                        <span>Technologies not found</span>
                                    @endforelse
                                    {{-- @dd($project) --}}
                                </td>
                                <td>
                                    <a class="btn btn-dark" href="{{ route('admin.projects.show', $project) }}">View</a>
                                    <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                    <x-button-delete :id="$project->id" :name="$project->name" :route="route('admin.projects.destroy', $project)">
                                    </x-button-delete>
                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row" colspan="5">No projects</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
