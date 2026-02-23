@extends('layouts.app')

@section('title', 'Squire Details')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Squire Details: {{ $squire->name }}</h3>
                <div>
                    <a href="{{ route('squires.edit', $squire) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('squires.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">ID</th>
                        <td>{{ $squire->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $squire->name }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>{{ $squire->age }}</td>
                    </tr>
                    <tr>
                        <th>Training Level</th>
                        <td>
                            @if($squire->training_level == 'beginner')
                                <span class="badge bg-info">Beginner</span>
                            @elseif($squire->training_level == 'intermediate')
                                <span class="badge bg-warning">Intermediate</span>
                            @else
                                <span class="badge bg-success">Advanced</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Knight</th>
                        <td>
                            @if($squire->knight)
                                <a href="{{ route('knights.show', $squire->knight) }}">
                                    {{ $squire->knight->name }} ({{ $squire->knight->title ?? 'Knight' }})
                                </a>
                            @else
                                <span class="text-muted">No Knight Assigned</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $squire->created_at->format('F j, Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $squire->updated_at->format('F j, Y H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection