@extends('layouts.app')

@section('title', 'Knights List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Knights of the Realm</h1>
    <a href="{{ route('knights.create') }}" class="btn btn-primary">Add New Knight</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Title</th>
                <th>Weapon</th>
                <th>Experience</th>
                <th>Squires</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($knights as $knight)
            <tr>
                <td>{{ $knight->id }}</td>
                <td>{{ $knight->name }}</td>
                <td>{{ $knight->age }}</td>
                <td>{{ $knight->title ?? 'No Title' }}</td>
                <td>{{ $knight->weapon ?? 'Unknown' }}</td>
                <td>{{ $knight->experience_years }} years</td>
                <td>{{ $knight->squires->count() }}</td>
                <td>
                    <a href="{{ route('knights.show', $knight) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('knights.edit', $knight) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('knights.destroy', $knight) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $knights->links() }}
</div>
@endsection