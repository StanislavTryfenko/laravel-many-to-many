@extends('layouts.admin')


@section('content')
    <div class="container py-5">
        <h1>Add a new project</h1>

        @include('partials.validation-messages')
        @include('partials.session-messages')


        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Project name" value="{{ old('name', $project->name) }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for the project</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <img height="100" src="{{ $project->image }}" alt="">
                <div class="mb-3 w-100">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="image" aria-describedby="imageHelper" />
                    <small id="imageHelper" class="form-text text-muted">Choose an image</small>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="6">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">
                Update
            </button>



        </form>

    </div>
@endsection
