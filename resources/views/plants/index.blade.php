@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h1 class="mb-4">Plant List</h1>

    <!-- Add Plant Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('plants.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add New Plant
        </a>
    </div>

    <!-- Plant Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Watering Interval</th>
                    <th scope="col">Fertilizing Interval (Optional)</th>
                    <th scope="col">Care Tips</th> <!-- New column for Care Tips -->
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plants as $plant)
                <tr>
                    <!-- Plant Picture -->
                    <td>
                        <img src="{{ $plant->picture ? asset('storage/' . $plant->picture) : 'https://via.placeholder.com/100' }}" 
                             alt="{{ $plant->name ?? 'No Image Available' }}" 
                             class="img-fluid rounded" 
                             style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    
                    <!-- Plant Details -->
                    <td>{{ $plant->name }}</td>
                    <td>{{ $plant->type }}</td>
                    <td>{{ $plant->watering_interval }} days</td>
                    <td>{{ $plant->fertilizing_interval ? $plant->fertilizing_interval . ' days' : 'N/A' }}</td>
                    <td>{{ $plant->care_tips ?? 'N/A' }}</td> <!-- Display Care Tips -->
                    
                    <!-- Actions -->
                    <td>
                        <div class="d-flex gap-2">
                            <!-- Edit Button -->
                            <a href="{{ route('plants.edit', $plant->id) }}" 
                               class="btn btn-success btn-sm">
                               <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Are you sure you want to delete {{ $plant->name }}?');">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                
                @if ($plants->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">No plants found.</td> <!-- Adjust colspan to 7 -->
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection