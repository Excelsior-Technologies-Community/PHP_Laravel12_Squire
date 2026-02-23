@extends('layouts.app')

@section('title', 'Edit Squire')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3>Edit Squire: {{ $squire->name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('squires.update', $squire) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Squire Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $squire->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror" 
                               id="age" name="age" value="{{ old('age', $squire->age) }}" min="10" max="30" required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="training_level" class="form-label">Training Level</label>
                        <select class="form-control @error('training_level') is-invalid @enderror" 
                                id="training_level" name="training_level" required>
                            <option value="">Select Level</option>
                            <option value="beginner" {{ old('training_level', $squire->training_level) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ old('training_level', $squire->training_level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ old('training_level', $squire->training_level) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        @error('training_level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="knight_id" class="form-label">Select Knight</label>
                        <select class="form-control @error('knight_id') is-invalid @enderror" 
                                id="knight_id" name="knight_id" required>
                            <option value="">Choose a Knight</option>
                            @foreach($knights as $knight)
                                <option value="{{ $knight->id }}" {{ old('knight_id', $squire->knight_id) == $knight->id ? 'selected' : '' }}>
                                    {{ $knight->name }} ({{ $knight->title ?? 'Knight' }})
                                </option>
                            @endforeach
                        </select>
                        @error('knight_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Squire</button>
                        <a href="{{ route('squires.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection