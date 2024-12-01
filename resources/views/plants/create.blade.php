@extends('layouts.app')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>{{ isset($plant) ? 'Edit Plant' : 'Add New Plant' }}</h1>

<form action="{{ isset($plant) ? route('plants.update', $plant->id) : route('plants.store') }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @if(isset($plant)) @method('PUT') @endif

    <div class="mb-3">
        <label for="name" class="form-label">Plant Name</label>
        <input type="text" class="form-control" id="name" name="name" 
               value="{{ old('name', $plant->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Plant Type</label>
        <input type="text" class="form-control" id="type" name="type" 
               value="{{ old('type', $plant->type ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="watering_interval" class="form-label">Watering Interval (Days)</label>
        <input type="number" class="form-control" id="watering_interval" name="watering_interval" 
               value="{{ old('watering_interval', $plant->watering_interval ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="fertilizing_interval" class="form-label">Fertilizing Interval (Days)</label>
        <input type="number" class="form-control" id="fertilizing_interval" name="fertilizing_interval" 
               value="{{ old('fertilizing_interval', $plant->fertilizing_interval ?? '') }}">
        <small class="form-text text-muted">Optional: Leave blank if not applicable.</small>
    </div>

    <div class="mb-3">
        <label for="care_tips" class="form-label">Care Tips</label>
        <textarea class="form-control" id="care_tips" name="care_tips">{{ old('care_tips', $plant->care_tips ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="picture" class="form-label">Plant Picture</label>
        <input type="file" class="form-control" id="picture" name="picture" accept="image/*">

        @if(isset($plant) && $plant->picture)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $plant->picture) }}" alt="Current picture of {{ $plant->name }}" width="150">
                <p class="text-muted">Current Picture</p>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-success">{{ isset($plant) ? 'Update' : 'Add' }} Plant</button>
</form>
@endsection