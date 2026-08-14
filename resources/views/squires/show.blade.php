@extends('layouts.app')

@section('title', 'Squire Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="page-title">
            {{ $squire->name }}
        </h2>

        <p class="text-muted mb-0">
            Squire details
        </p>

    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('squires.edit', $squire) }}"
            class="btn btn-warning">
            Edit
        </a>

        <a
            href="{{ route('squires.index') }}"
            class="btn btn-outline-secondary">
            ← Back
        </a>

    </div>

</div>


<div class="row">

    <div class="col-lg-8">

        <div class="card">

            <div class="card-body p-4">

                <h5 class="card-title mb-4">
                    Squire Information
                </h5>


                <div class="row">

                    <div class="col-md-6 mb-4">

                        <small class="text-muted">
                            Name
                        </small>

                        <h5>
                            {{ $squire->name }}
                        </h5>

                    </div>


                    <div class="col-md-6 mb-4">

                        <small class="text-muted">
                            Age
                        </small>

                        <h5>
                            {{ $squire->age }}
                        </h5>

                    </div>


                    <div class="col-md-6 mb-4">

                        <small class="text-muted">
                            Training Level
                        </small>

                        <div>

                            <span class="badge bg-info text-dark fs-6">
                                {{ $squire->training_level }}
                            </span>

                        </div>

                    </div>


                    <div class="col-md-6 mb-4">

                        <small class="text-muted">
                            Knight
                        </small>

                        <h5>

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

                        </h5>

                    </div>


                    <div class="col-md-6">

                        <small class="text-muted">
                            Created
                        </small>

                        <p>
                            {{ $squire->created_at?->format('d M Y H:i') }}
                        </p>

                    </div>


                    <div class="col-md-6">

                        <small class="text-muted">
                            Last Updated
                        </small>

                        <p>
                            {{ $squire->updated_at?->format('d M Y H:i') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection