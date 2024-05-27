@extends('layouts.admin')


@section('content')
    <div class="container py-5">
        <h1>Create a new project</h1>

        @include('partials.validation-messages')

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Project name" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for the project</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option disabled selected>Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <img height="100" src="{{ old('image') }}" alt="">
                <div class="mb-3 w-100">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="image" aria-describedby="imageHelper" />
                    <small id="imageHelper" class="form-text text-muted">Chose an image</small>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="6">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">
                Create
            </button>



        </form>

    </div>
@endsection
