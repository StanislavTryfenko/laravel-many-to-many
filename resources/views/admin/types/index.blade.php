@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between">
            <h1>Types list</h1>
            <a class="btn btn-primary align-self-center" href="{{ route('admin.types.create') }}">New type</a>
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
                            <th scope="col">NAME</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                            <tr class="">
                                <td scope="row">{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.types.edit', $type) }}">Edit</a>
                                    <x-button-delete :id="$type->id" :name="$type->name" :route="route('admin.types.destroy', $type)">
                                    </x-button-delete>
                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row" colspan="3">No types</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{ $types->links() }}
@endsection
