@extends('layouts.app')

@section('title', 'Knights List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="mb-1">Knights of the Realm</h1>
        <p class="text-muted mb-0">
            Manage knights and their assigned squires.
        </p>
    </div>

    <a
        href="{{ route('knights.create') }}"
        class="btn btn-primary"
    >
        Add New Knight
    </a>

</div>


{{-- Search --}}

<div class="card mb-4 shadow-sm">

    <div class="card-body">

        <form
            action="{{ route('knights.index') }}"
            method="GET"
        >

            <div class="row g-2">

                <div class="col-md-10">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ $search }}"
                        placeholder="Search by knight name, title or weapon..."
                    >

                </div>

                <div class="col-md-2 d-grid">

                    <button
                        type="submit"
                        class="btn btn-dark"
                    >
                        Search
                    </button>

                </div>

            </div>

            @if($search !== '')

                <div class="mt-2">

                    <a
                        href="{{ route('knights.index') }}"
                        class="btn btn-sm btn-outline-secondary"
                    >
                        Clear Search
                    </a>

                    <span class="text-muted ms-2">
                        Searching for: <strong>{{ $search }}</strong>
                    </span>

                </div>

            @endif

        </form>

    </div>

</div>


<div class="table-responsive">

    <table class="table table-striped table-hover align-middle">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Title</th>
                <th>Weapon</th>
                <th>Experience</th>
                <th>Squires</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

            @forelse($knights as $knight)

                <tr>

                    <td>
                        {{ $knight->id }}
                    </td>

                    <td>
                        <strong>
                            {{ $knight->name }}
                        </strong>
                    </td>

                    <td>
                        {{ $knight->age }}
                    </td>

                    <td>
                        {{ $knight->title ?? 'No Title' }}
                    </td>

                    <td>
                        {{ $knight->weapon ?? 'Unknown' }}
                    </td>

                    <td>
                        {{ $knight->experience_years }} years
                    </td>

                    <td>

                        <span class="badge bg-primary">
                            {{ $knight->squires->count() }}
                        </span>

                    </td>

                    <td>

                        <a
                            href="{{ route('knights.show', $knight) }}"
                            class="btn btn-sm btn-info"
                        >
                            View
                        </a>

                        <a
                            href="{{ route('knights.edit', $knight) }}"
                            class="btn btn-sm btn-warning"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('knights.destroy', $knight) }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this knight?')"
                            >
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="8"
                        class="text-center py-4"
                    >
                        No knights found.

                        @if($search !== '')
                            Try another search.
                        @endif

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div class="d-flex justify-content-center">

    {{ $knights->links() }}

</div>

@endsection