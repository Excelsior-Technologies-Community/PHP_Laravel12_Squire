@extends('layouts.app')

@section('title', 'Edit Squire')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="page-title">
                    Edit Squire
                </h2>

                <p class="text-muted">
                    Update squire information
                </p>

            </div>

            <a
                href="{{ route('squires.index') }}"
                class="btn btn-outline-secondary">
                ← Back
            </a>

        </div>


        <div class="card">

            <div class="card-body p-4">

                <form
                    method="POST"
                    action="{{ route('squires.update', $squire) }}">

                    @csrf

                    @method('PUT')


                    <div class="mb-3">

                        <label class="form-label">
                            Knight
                        </label>

                        <select
                            name="knight_id"
                            class="form-select @error('knight_id') is-invalid @enderror">

                            @foreach($knights as $knight)

                            <option
                                value="{{ $knight->id }}"
                                {{ old('knight_id', $squire->knight_id) == $knight->id ? 'selected' : '' }}>
                                {{ $knight->name }} - {{ $knight->title }}
                            </option>

                            @endforeach

                        </select>

                        @error('knight_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Squire Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $squire->name) }}">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Age
                        </label>

                        <input
                            type="number"
                            name="age"
                            class="form-control @error('age') is-invalid @enderror"
                            value="{{ old('age', $squire->age) }}"
                            min="10"
                            max="100">

                        @error('age')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Training Level
                        </label>

                        <select
                            name="training_level"
                            class="form-select @error('training_level') is-invalid @enderror">

                            <option
                                value="Beginner"
                                {{ old('training_level', $squire->training_level) == 'Beginner' ? 'selected' : '' }}>
                                Beginner
                            </option>

                            <option
                                value="Intermediate"
                                {{ old('training_level', $squire->training_level) == 'Intermediate' ? 'selected' : '' }}>
                                Intermediate
                            </option>

                            <option
                                value="Advanced"
                                {{ old('training_level', $squire->training_level) == 'Advanced' ? 'selected' : '' }}>
                                Advanced
                            </option>

                        </select>

                        @error('training_level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div class="d-flex justify-content-end gap-2">

                        <a
                            href="{{ route('squires.index') }}"
                            class="btn btn-secondary">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-success">
                            Update Squire
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection