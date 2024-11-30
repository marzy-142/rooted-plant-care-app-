@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Plant</h1>
    <form action="{{ route('plants.update', $plant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Plant Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $plant->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Plant Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $plant->type) }}">
        </div>

        <div class="mb-3">
            <label for="watering_interval" class="form-label">Watering Interval (days)</label>
            <input type="number" class="form-control" id="watering_interval" name="watering_interval" 
                value="{{ old('watering_interval', $plant->watering_interval) }}" required>
        </div>

        <div class="mb-3">
            <label for="fertilizing_interval" class="form-label">Fertilizing Interval (days)</label>
            <input type="number" class="form-control" id="fertilizing_interval" name="fertilizing_interval" 
                value="{{ old('fertilizing_interval', $plant->fertilizing_interval) }}">
        </div>

        <div class="mb-3">
            <label for="care_tips" class="form-label">Care Tips</label>
            <textarea class="form-control" id="care_tips" name="care_tips">{{ old('care_tips', $plant->care_tips) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label">Plant Picture</label>
            <input type="file" class="form-control" id="picture" name="picture">

            @if ($plant->picture)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $plant->picture) }}" alt="Current Picture" width="150">
                    <p class="text-muted">Current Picture</p>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Plant</button>
        <a href="{{ route('plants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
