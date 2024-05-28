@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h1>Technologies</h1>
            <a class="btn btn-primary" href="{{ route('admin.technologies.create') }}">New technology</a>
        </div>
    </header>
    <section class="py-5">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                            <tr class="">
                                <td scope="row">{{ $technology->id }}</td>
                                <td>{{ $technology->name }}</td>
                                <td>{{ $technology->slug }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.technologies.edit', $technology) }}">Edit</a>
                                    <x-button-delete :id="$technology->id" :name="$technology->name" :route="route('admin.technologies.destroy', $technology)">
                                    </x-button-delete>
                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row" colspan="3">No technologies</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{ $technologies->links() }}
@endSection
