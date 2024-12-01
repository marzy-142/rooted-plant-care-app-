@extends('layouts.app')

@section('content')
<div class="jumbotron bg-light p-5 rounded-lg shadow-sm">
    <h1 class="display-4">Welcome to <span class="highlight">Rooted</span> 🌿</h1>
    <p class="lead">Your ultimate companion for keeping your plants happy and thriving!</p>
    <hr class="my-4">
    <p>Get started by exploring your plants, adding new ones, or learning more about plant care.</p>
    <a class="btn btn-success btn-lg" href="{{ route('plants.index') }}" role="button">View Plants</a>
    <a class="btn btn-outline-success btn-lg" href="{{ url('/about') }}" role="button">Learn More</a>
</div>

<div class="container">
    <!-- Benefits Section -->
    <div class="row my-5">
        <div class="col-md-6">
            <h2>Why Take Care of Plants?</h2>
            <ul>
                <li><strong>Improved Air Quality:</strong> Plants help purify the air by absorbing toxins and producing oxygen.</li>
                <li><strong>Reduced Stress:</strong> Taking care of plants can help reduce stress and improve mental well-being.</li>
                <li><strong>Enhanced Aesthetics:</strong> Plants brighten up any space, adding beauty and life to your home or office.</li>
                <li><strong>Better Productivity:</strong> Studies show that plants in the workplace can increase productivity and creativity.</li>
            </ul>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/plants.jpg') }}" class="img-fluid rounded shadow-lg" alt="Plant Care">
        </div>
    </div>

    <!-- Plant Care Tips Section -->
    <div class="row my-5">
        <div class="col-12">
            <h2>Plant Care Tips</h2>
            <p>Whether you're new to plant care or an experienced gardener, <span class="highlight">Rooted</span> offers helpful tips to ensure your plants flourish:</p>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Watering Your Plants</h5>
                    <p class="card-text">Different plants have different watering needs. Make sure you know your plant's specific needs and avoid overwatering. Use the watering schedule provided by <span class="highlight">Rooted</span> to help keep track of your watering times.</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sunlight Requirements</h5>
                    <p class="card-text">Plants need light, but the amount and type of light varies. Some plants thrive in full sunlight, while others prefer low-light environments. <span class="highlight">Rooted</span> can help you understand your plant's preferences.</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Fertilizing for Growth</h5>
                    <p class="card-text">Fertilizers are essential for healthy plant growth. Learn when and how to fertilize your plants for optimal growth.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="jumbotron bg-success text-white text-center p-4 mt-5">
        <h3>Join the <span class="highlight">Rooted</span> Community</h3>
        <p>Get access to personalized plant care schedules, tips, and more. Start caring for your plants today!</p>
        <a class="btn btn-light btn-lg" href="{{ route('plants.index') }}" role="button">Start Your Plant Journey</a>
    </div>
</div>

@endsection