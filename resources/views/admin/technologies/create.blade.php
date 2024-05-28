@extends('layouts.admin')

@section('content')
    <section class="bg-light">
        <div class="container py-5">
            <h1>Create a new technology</h1>

            @include('partials.validation-messages')

            <form action="{{ route('admin.technologies.store') }}" method="post">
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

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </section>
@endsection
