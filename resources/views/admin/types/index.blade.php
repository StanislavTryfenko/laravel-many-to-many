@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white shadow-lg">
        <div class="container d-flex justify-content-between">
            <h1>Types</h1>
            <a class="btn btn-primary align-self-center" href="{{ route('admin.types.create') }}">New type</a>
        </div>
    </header>
    <section class="py-5 bg-light">
        <div class="container">
            @include('partials.session-messages')

            <div class="table-responsive">
                <table class="table table-secondary table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 210px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($types as $type)
                            <tr class="">
                                <td scope="row">{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>
                                    <x-offcanvas.types :id="$type->id" :name="$type->name" :route=" route('admin.types.update', $type)" >
                                    </x-offcanvas.types>
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
    {{ $types->links('pagination::bootstrap-5') }}
@endsection
