@extends('layouts.admin')

@section('content')
    <section class="bg-light">
        <div class="container py-5">
            <div class="d-flex justify-content-between">
                <h1>Edit: {{ $technology->name }}</h1>
                <a class="btn btn-primary align-self-center" href="{{ route('admin.technologies.index') }}">Go back</a>
            </div>

            @include('partials.validation-messages')
            @include('partials.session-messages')

            <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" aria-describedby="nameHelper" placeholder="Technology name"
                        value="{{ old('name', $technology->name) }}" />
                    <small id="nameHelper" class="form-text text-muted">Type a name for the technology</small>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
@endSection
