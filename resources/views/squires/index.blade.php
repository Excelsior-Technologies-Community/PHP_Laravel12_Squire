@extends('layouts.app')

@section('title', 'Squires List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Squires in Training</h1>
    <a href="{{ route('squires.create') }}" class="btn btn-primary">Assign New Squire</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
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
                <td>{{ $squire->id }}</td>
                <td>{{ $squire->name }}</td>
                <td>{{ $squire->age }}</td>
                <td>
                    @if($squire->training_level == 'beginner')
                        <span class="badge bg-info">Beginner</span>
                    @elseif($squire->training_level == 'intermediate')
                        <span class="badge bg-warning">Intermediate</span>
                    @else
                        <span class="badge bg-success">Advanced</span>
                    @endif
                </td>
                <td>{{ $squire->knight->name ?? 'No Knight Assigned' }}</td>
                <td>
                    <a href="{{ route('squires.show', $squire) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('squires.edit', $squire) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('squires.destroy', $squire) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to dismiss this squire?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No squires found. <a href="{{ route('squires.create') }}">Assign a squire</a></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $squires->links() }}
</div>
@endsection