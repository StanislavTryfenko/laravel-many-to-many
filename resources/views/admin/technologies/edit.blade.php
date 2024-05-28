@extends('layouts.admin')

@section('content')
    <div class="bg-dark text-white p-4">
        <div class="container">
            <h1>Technologies</h1>
            <a class="btn btn-primary" href="{{ route('admin.technologies.create') }}">New technology</a>
        </div>
    </div>
    <div class="container">
        <h1>Edit: {{ $technology->name }}</h1>
        @include('partials.validation-messages')
        @include('partials.session-messages')
        <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Technology name" value="{{ old('name', $technology->name) }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for the technology</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endSection