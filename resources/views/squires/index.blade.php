@extends('layouts.app')

@section('title', 'Squires')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="page-title mb-1">Squires</h2>

        <p class="text-muted mb-0">
            Manage all squires
        </p>
    </div>

    <a
        href="{{ route('squires.create') }}"
        class="btn btn-primary">
        + Add Squire
    </a>

</div>


<div class="card mb-4">

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('squires.index') }}">

            <div class="row g-2">

                <div class="col-md-9">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search by name or training level..."
                        value="{{ $search ?? request('search') }}">

                </div>

                <div class="col-md-3 d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-dark w-100">
                        Search
                    </button>

                    <a
                        href="{{ route('squires.index') }}"
                        class="btn btn-outline-secondary">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </div>

</div>


<div class="card">

    <div class="card-body">

        @if($squires->count() > 0)

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                        <th>Age</th>

                        <th>Training Level</th>

                        <th>Knight</th>

                        <th>Created</th>

                        <th width="220">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($squires as $squire)

                    <tr>

                        <td>
                            {{ $squires->firstItem() + $loop->index }}
                        </td>

                        <td>
                            <strong>
                                {{ $squire->name }}
                            </strong>
                        </td>

                        <td>
                            {{ $squire->age }}
                        </td>

                        <td>

                            <span class="badge bg-info text-dark">
                                {{ $squire->training_level }}
                            </span>

                        </td>

                        <td>

                            @if($squire->knight)

                            <a
                                href="{{ route('knights.show', $squire->knight) }}">
                                {{ $squire->knight->name }}
                            </a>

                            @else

                            <span class="text-muted">
                                Not assigned
                            </span>

                            @endif

                        </td>

                        <td>
                            {{ $squire->created_at?->format('d M Y') }}
                        </td>

                        <td>

                            <div class="action-buttons">

                                <a
                                    href="{{ route('squires.show', $squire) }}"
                                    class="btn btn-sm btn-info text-white">
                                    View
                                </a>

                                <a
                                    href="{{ route('squires.edit', $squire) }}"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('squires.destroy', $squire) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this squire?');">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <div class="mt-3">

            {{ $squires->withQueryString()->links() }}

        </div>

        @else

        <div class="text-center py-5">

            <h5>
                No squires found
            </h5>

            <p class="text-muted">
                There are no squires matching your search.
            </p>

            <a
                href="{{ route('squires.create') }}"
                class="btn btn-primary">
                Add First Squire
            </a>

        </div>

        @endif

    </div>

</div>

@endsection