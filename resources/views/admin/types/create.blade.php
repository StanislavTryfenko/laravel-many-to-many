@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>Create a new type</h1>

        @include('partials.validation-messages')

        <form action="{{ route('admin.types.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Type name" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for the type</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

@endsection