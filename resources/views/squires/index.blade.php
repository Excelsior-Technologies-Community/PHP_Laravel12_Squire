@extends('layouts.app')

@section('title', 'Squires List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="mb-1">Squires in Training</h1>

        <p class="text-muted mb-0">
            Search and filter squires by their training progress.
        </p>
    </div>

    <a
        href="{{ route('squires.create') }}"
        class="btn btn-primary"
    >
        Assign New Squire
    </a>

</div>


{{-- Search & Filter --}}

<div class="card mb-4 shadow-sm">

    <div class="card-body">

        <form
            action="{{ route('squires.index') }}"
            method="GET"
        >

            <div class="row g-3">

                <div class="col-md-6">

                    <label
                        for="search"
                        class="form-label"
                    >
                        Search
                    </label>

                    <input
                        type="text"
                        name="search"
                        id="search"
                        class="form-control"
                        value="{{ $search }}"
                        placeholder="Search squire or knight name..."
                    >

                </div>


                <div class="col-md-4">

                    <label
                        for="training_level"
                        class="form-label"
                    >
                        Training Level
                    </label>

                    <select
                        name="training_level"
                        id="training_level"
                        class="form-select"
                    >

                        <option value="">
                            All Training Levels
                        </option>

                        <option
                            value="beginner"
                            {{ $trainingLevel === 'beginner' ? 'selected' : '' }}
                        >
                            Beginner
                        </option>

                        <option
                            value="intermediate"
                            {{ $trainingLevel === 'intermediate' ? 'selected' : '' }}
                        >
                            Intermediate
                        </option>

                        <option
                            value="advanced"
                            {{ $trainingLevel === 'advanced' ? 'selected' : '' }}
                        >
                            Advanced
                        </option>

                    </select>

                </div>


                <div class="col-md-2 d-flex align-items-end">

                    <button
                        type="submit"
                        class="btn btn-dark w-100"
                    >
                        Filter
                    </button>

                </div>

            </div>


            @if($search !== '' || $trainingLevel !== '')

                <div class="mt-3">

                    <a
                        href="{{ route('squires.index') }}"
                        class="btn btn-sm btn-outline-secondary"
                    >
                        Clear Filters
                    </a>

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
                <th>Training Level</th>
                <th>Knight</th>
                <th>Actions</th>

            </tr>

        </thead>


        <tbody>

            @forelse($squires as $squire)

                <tr>

                    <td>
                        {{ $squire->id }}
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

                        @if($squire->training_level === 'beginner')

                            <span class="badge bg-info">
                                Beginner
                            </span>

                        @elseif($squire->training_level === 'intermediate')

                            <span class="badge bg-warning text-dark">
                                Intermediate
                            </span>

                        @else

                            <span class="badge bg-success">
                                Advanced
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($squire->knight)

                            <a
                                href="{{ route('knights.show', $squire->knight) }}"
                            >
                                {{ $squire->knight->name }}
                            </a>

                        @else

                            <span class="text-muted">
                                No Knight Assigned
                            </span>

                        @endif

                    </td>

                    <td>

                        <a
                            href="{{ route('squires.show', $squire) }}"
                            class="btn btn-sm btn-info"
                        >
                            View
                        </a>

                        <a
                            href="{{ route('squires.edit', $squire) }}"
                            class="btn btn-sm btn-warning"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('squires.destroy', $squire) }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to dismiss this squire?')"
                            >
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="6"
                        class="text-center py-4"
                    >
                        No squires found.

                        @if($search !== '' || $trainingLevel !== '')
                            Try changing your search or filter.
                        @else
                            <a href="{{ route('squires.create') }}">
                                Assign a squire
                            </a>
                        @endif

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div class="d-flex justify-content-center">

    {{ $squires->links() }}

</div>

@endsection