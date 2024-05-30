<a class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-{{ $id }}"
    aria-controls="offcanvas-{{ $id }}">Edit</a>



<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvas-{{ $id }}"
    aria-labelledby="offcanvas-{{ $id }}Label">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvas-{{ $id }}Label">Edit {{ $name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ $route }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" aria-describedby="nameHelper" placeholder="Type name"
                    value="{{ old('name', $name) }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for the type</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
