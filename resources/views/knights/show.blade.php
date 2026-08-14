@extends('layouts.app')

@section('title', 'Knight Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            {{ $knight->name }}
        </h2>

        <p class="text-muted mb-0">
            Knight details and assigned squires.
        </p>

    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('knights.edit', $knight) }}"
            class="btn btn-warning">
            Edit
        </a>

        <a
            href="{{ route('knights.index') }}"
            class="btn btn-outline-secondary">
            ← Back
        </a>

    </div>

</div>


<div class="row g-4">


    {{-- KNIGHT DETAILS --}}

    <div class="col-lg-5">

        <div class="card">

            <div class="card-body">

                <h5 class="fw-bold mb-4">
                    Knight Information
                </h5>


                <div class="mb-4">

                    <small class="text-muted">
                        Name
                    </small>

                    <h5>
                        {{ $knight->name }}
                    </h5>

                </div>


                <div class="mb-4">

                    <small class="text-muted">
                        Title
                    </small>

                    <div>

                        <span class="badge bg-secondary">

                            {{ $knight->title }}

                        </span>

                    </div>

                </div>


                <div class="mb-4">

                    <small class="text-muted">
                        Age
                    </small>

                    <h5>
                        {{ $knight->age }} years
                    </h5>

                </div>


                <div class="mb-4">

                    <small class="text-muted">
                        Assigned Squires
                    </small>

                    <h5>

                        {{ $knight->squires->count() }}

                    </h5>

                </div>


                <div>

                    <small class="text-muted">
                        Created
                    </small>

                    <p class="mb-0">

                        {{ $knight->created_at?->format('d M Y H:i') }}

                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- SQUIRES --}}

    <div class="col-lg-7">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h5 class="fw-bold mb-0">
                        Assigned Squires
                    </h5>

                    <a
                        href="{{ route('squires.create') }}?knight_id={{ $knight->id }}"
                        class="btn btn-sm btn-primary">
                        + Add Squire
                    </a>

                </div>


                @if($knight->squires->count())

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>

                            <tr>

                                <th>
                                    Name
                                </th>

                                <th>
                                    Age
                                </th>

                                <th>
                                    Training
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($knight->squires as $squire)

                            <tr>

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

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                @else

                <div class="text-center py-4">

                    <p class="text-muted">
                        No squires assigned.
                    </p>

                    <a
                        href="{{ route('squires.create') }}?knight_id={{ $knight->id }}"
                        class="btn btn-primary">
                        Assign Squire
                    </a>

                </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection