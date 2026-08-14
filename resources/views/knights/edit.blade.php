@extends('layouts.app')

@section('title', 'Knights')

@section('content')

{{-- ============================= --}}
{{-- PAGE HEADER --}}
{{-- ============================= --}}

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Knights
        </h2>

        <p class="text-muted mb-0">
            Manage knights, their squires and records.
        </p>

    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('knights.create') }}"
            class="btn btn-primary">
            + Add Knight
        </a>

        <a
            href="{{ route('squires.index') }}"
            class="btn btn-outline-dark">
            View Squires
        </a>

    </div>

</div>


{{-- ============================= --}}
{{-- FUNCTIONALITY BADGES --}}
{{-- ============================= --}}

<div class="card mb-4">

    <div class="card-body">

        <h6 class="fw-bold mb-3">
            Available Features
        </h6>

        <span class="badge bg-primary feature-badge">
            CRUD
        </span>

        <span class="badge bg-success feature-badge">
            Search
        </span>

        <span class="badge bg-info text-dark feature-badge">
            Filters
        </span>

        <span class="badge bg-secondary feature-badge">
            Pagination
        </span>

        <span class="badge bg-warning text-dark feature-badge">
            Knight-Squire Assignment
        </span>

        <span class="badge bg-danger feature-badge">
            Delete
        </span>

        <span class="badge bg-dark feature-badge">
            Validation
        </span>

        <span class="badge bg-primary feature-badge">
            Responsive UI
        </span>

        @if(Route::has('knights.restore'))

        <span class="badge bg-success feature-badge">
            Restore
        </span>

        @endif

        @if(Route::has('activity-logs.index'))

        <span class="badge bg-dark feature-badge">
            Activity Logs
        </span>

        @endif

    </div>

</div>


{{-- ============================= --}}
{{-- STATISTICS --}}
{{-- ============================= --}}

<div class="row g-3 mb-4">

    <div class="col-md-4">

        <div class="card stat-card">

            <div class="card-body">

                <div class="text-muted">
                    Total Knights
                </div>

                <div class="stat-number text-primary">

                    {{ $knights->total() }}

                </div>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="card stat-card">

            <div class="card-body">

                <div class="text-muted">
                    Knights on Current Page
                </div>

                <div class="stat-number text-success">

                    {{ $knights->count() }}

                </div>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="card stat-card">

            <div class="card-body">

                <div class="text-muted">
                    Total Squires
                </div>

                <div class="stat-number text-info">

                    {{ $knights->sum('squires_count') }}

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ============================= --}}
{{-- SEARCH + FILTER --}}
{{-- ============================= --}}

<div class="card mb-4">

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('knights.index') }}">

            <div class="row g-3">

                {{-- SEARCH --}}

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Search
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search knight name or title..."
                        value="{{ request('search') }}">

                </div>


                {{-- AGE FILTER --}}

                <div class="col-md-3">

                    <label class="form-label fw-semibold">
                        Age
                    </label>

                    <input
                        type="number"
                        name="age"
                        class="form-control"
                        placeholder="Enter age"
                        min="1"
                        value="{{ request('age') }}">

                </div>


                {{-- BUTTONS --}}

                <div class="col-md-3">

                    <label class="form-label d-block">
                        &nbsp;
                    </label>

                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-dark w-100">
                            🔍 Search
                        </button>

                        <a
                            href="{{ route('knights.index') }}"
                            class="btn btn-outline-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>


{{-- ============================= --}}
{{-- KNIGHTS TABLE --}}
{{-- ============================= --}}

<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>

                <h5 class="fw-bold mb-1">
                    Knight Records
                </h5>

                <small class="text-muted">
                    Showing {{ $knights->count() }}
                    of {{ $knights->total() }} knights
                </small>

            </div>

        </div>


        @if($knights->count() > 0)

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                        <th>Title</th>

                        <th>Age</th>

                        <th>Squires</th>

                        <th>Created</th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($knights as $knight)

                    <tr>

                        {{-- NUMBER --}}

                        <td>

                            {{ $knights->firstItem() + $loop->index }}

                        </td>


                        {{-- NAME --}}

                        <td>

                            <strong>
                                {{ $knight->name }}
                            </strong>

                        </td>


                        {{-- TITLE --}}

                        <td>

                            <span class="badge bg-secondary">

                                {{ $knight->title }}

                            </span>

                        </td>


                        {{-- AGE --}}

                        <td>

                            {{ $knight->age }}

                            years

                        </td>


                        {{-- SQUIRE COUNT --}}

                        <td>

                            <span class="badge bg-info text-dark">

                                {{ $knight->squires_count }}

                            </span>

                        </td>


                        {{-- CREATED --}}

                        <td>

                            {{ $knight->created_at?->format('d M Y') }}

                        </td>


                        {{-- ACTIONS --}}

                        <td>

                            <div class="action-buttons">


                                {{-- VIEW --}}

                                <a
                                    href="{{ route('knights.show', $knight) }}"
                                    class="btn btn-sm btn-info text-white">
                                    View
                                </a>


                                {{-- EDIT --}}

                                <a
                                    href="{{ route('knights.edit', $knight) }}"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>


                                {{-- ADD SQUIRE --}}

                                <a
                                    href="{{ route('squires.create') }}?knight_id={{ $knight->id }}"
                                    class="btn btn-sm btn-primary">
                                    + Squire
                                </a>


                                {{-- DELETE --}}

                                <form
                                    action="{{ route('knights.destroy', $knight) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this knight?');">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger">
                                        Delete
                                    </button>

                                </form>


                                {{-- RESTORE --}}
                                {{-- Only shown if the route exists --}}

                                @if(Route::has('knights.restore'))

                                <form
                                    action="{{ route('knights.restore', $knight->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf

                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-success">
                                        Restore
                                    </button>

                                </form>

                                @endif


                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- ============================= --}}
        {{-- PAGINATION --}}
        {{-- ============================= --}}

        <div class="mt-4">

            {{ $knights->withQueryString()->links() }}

        </div>


        @else

        {{-- EMPTY STATE --}}

        <div class="text-center py-5">

            <div class="display-5 mb-3">
                ⚔️
            </div>

            <h5>
                No Knights Found
            </h5>

            <p class="text-muted">
                No knight matches your search/filter.
            </p>

            <a
                href="{{ route('knights.create') }}"
                class="btn btn-primary">
                + Add Knight
            </a>

        </div>

        @endif

    </div>

</div>

@endsection