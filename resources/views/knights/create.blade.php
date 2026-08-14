@extends('layouts.app')

@section('title', 'Add Knight')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="page-title">Add Knight</h2>
                <p class="text-muted">
                    Create a new knight
                </p>
            </div>

            <a
                href="{{ route('knights.index') }}"
                class="btn btn-outline-secondary">
                ← Back
            </a>

        </div>


        <div class="card">

            <div class="card-body p-4">

                <form
                    method="POST"
                    action="{{ route('knights.store') }}">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Knight Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            placeholder="Enter knight name">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            placeholder="Example: Knight Commander">

                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Experience
                        </label>

                        <div class="input-group">

                            <input
                                type="number"
                                name="experience"
                                class="form-control @error('experience') is-invalid @enderror"
                                value="{{ old('experience') }}"
                                min="0"
                                placeholder="Enter experience">

                            <span class="input-group-text">
                                Years
                            </span>

                        </div>

                        @error('experience')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="d-flex justify-content-end gap-2">

                        <a
                            href="{{ route('knights.index') }}"
                            class="btn btn-secondary">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary">
                            Create Knight
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection