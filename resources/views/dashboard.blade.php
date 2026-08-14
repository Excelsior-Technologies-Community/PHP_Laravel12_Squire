@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Squire Management Dashboard
            </h2>

            <p class="text-muted mb-0">
                Overview of knights, squires and training progress.
            </p>
        </div>

        <div class="d-flex gap-2 mt-3 mt-md-0">

            <a href="{{ route('knights.create') }}" class="btn btn-primary">
                + Add Knight
            </a>

            <a href="{{ route('squires.create') }}" class="btn btn-success">
                + Assign Squire
            </a>

        </div>

    </div>


    {{-- =====================================================
         MAIN STATISTICS
    ====================================================== --}}

    <div class="row g-4 mb-4">

        {{-- Total Knights --}}
        <div class="col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Total Knights
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ $totalKnights }}
                            </h2>

                        </div>

                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <span class="fs-4 text-primary">⚔</span>
                        </div>

                    </div>

                    <small class="text-primary">
                        Registered knights
                    </small>

                </div>

            </div>

        </div>


        {{-- Total Squires --}}
        <div class="col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Total Squires
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ $totalSquires }}
                            </h2>

                        </div>

                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <span class="fs-4 text-success">👥</span>
                        </div>

                    </div>

                    <small class="text-success">
                        Squires currently in training
                    </small>

                </div>

            </div>

        </div>


        {{-- Average --}}
        <div class="col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Average Squires / Knight
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ $averageSquiresPerKnight }}
                            </h2>

                        </div>

                        <div class="rounded-circle bg-info bg-opacity-10 p-3">
                            <span class="fs-4 text-info">📊</span>
                        </div>

                    </div>

                    <small class="text-info">
                        Training distribution
                    </small>

                </div>

            </div>

        </div>


        {{-- Advanced --}}
        <div class="col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Advanced Squires
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ $advancedSquires }}
                            </h2>

                        </div>

                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <span class="fs-4 text-success">✓</span>
                        </div>

                    </div>

                    <small class="text-success">
                        Highest training level
                    </small>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         TRAINING LEVEL STATISTICS
    ====================================================== --}}

    <div class="row g-4 mb-4">

        {{-- Beginner --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="fw-bold mb-0">
                            Beginner
                        </h5>

                        <span class="badge bg-primary">
                            {{ $beginnerSquires }}
                        </span>

                    </div>

                    @php
                        $beginnerPercentage = $totalSquires > 0
                            ? round(($beginnerSquires / $totalSquires) * 100, 1)
                            : 0;
                    @endphp

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Squires
                        </span>

                        <strong>
                            {{ $beginnerPercentage }}%
                        </strong>

                    </div>

                    <div class="progress" style="height: 8px;">

                        <div
                            class="progress-bar bg-primary"
                            style="width: {{ $beginnerPercentage }}%"
                        ></div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Intermediate --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="fw-bold mb-0">
                            Intermediate
                        </h5>

                        <span class="badge bg-warning text-dark">
                            {{ $intermediateSquires }}
                        </span>

                    </div>

                    @php
                        $intermediatePercentage = $totalSquires > 0
                            ? round(($intermediateSquires / $totalSquires) * 100, 1)
                            : 0;
                    @endphp

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Squires
                        </span>

                        <strong>
                            {{ $intermediatePercentage }}%
                        </strong>

                    </div>

                    <div class="progress" style="height: 8px;">

                        <div
                            class="progress-bar bg-warning"
                            style="width: {{ $intermediatePercentage }}%"
                        ></div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Advanced --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="fw-bold mb-0">
                            Advanced
                        </h5>

                        <span class="badge bg-success">
                            {{ $advancedSquires }}
                        </span>

                    </div>

                    @php
                        $advancedPercentage = $totalSquires > 0
                            ? round(($advancedSquires / $totalSquires) * 100, 1)
                            : 0;
                    @endphp

                    <div class="d-flex justify-content-between mb-2">

                        <span class="text-muted">
                            Squires
                        </span>

                        <strong>
                            {{ $advancedPercentage }}%
                        </strong>

                    </div>

                    <div class="progress" style="height: 8px;">

                        <div
                            class="progress-bar bg-success"
                            style="width: {{ $advancedPercentage }}%"
                        ></div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         TOP KNIGHTS
    ====================================================== --}}

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">

                <div>

                    <h5 class="fw-bold mb-1">
                        Top Knights by Number of Squires
                    </h5>

                    <p class="text-muted small mb-0">
                        Knights currently responsible for the most squires.
                    </p>

                </div>

                <a
                    href="{{ route('knights.index') }}"
                    class="btn btn-sm btn-outline-primary mt-3 mt-md-0"
                >
                    View All Knights
                </a>

            </div>

        </div>


        @if($topKnights->count())

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Knight</th>

                            <th>Title</th>

                            <th>Experience</th>

                            <th>Squires</th>

                            <th class="text-end">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($topKnights as $index => $knight)

                            <tr>

                                <td class="text-muted">
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $knight->name }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $knight->title ?? 'No Title' }}
                                </td>

                                <td>
                                    {{ $knight->experience_years }} years
                                </td>

                                <td>

                                    <span class="badge bg-primary-subtle text-primary">
                                        {{ $knight->squires_count }}
                                        {{ Str::plural('Squire', $knight->squires_count) }}
                                    </span>

                                </td>

                                <td class="text-end">

                                    <a
                                        href="{{ route('knights.show', $knight) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-5">

                <h6 class="fw-bold">
                    No knights available yet
                </h6>

                <p class="text-muted">
                    Add your first knight to start managing squires.
                </p>

                <a
                    href="{{ route('knights.create') }}"
                    class="btn btn-primary"
                >
                    Add First Knight
                </a>

            </div>

        @endif

    </div>

</div>

@endsection